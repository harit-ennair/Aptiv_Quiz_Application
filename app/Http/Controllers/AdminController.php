<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Show the admin login form
     */
    public function showLogin()
    {
        return view('admin.login');
    }    /**
     * Handle admin login attempt
     */
    public function login(Request $request)
    {
        $request->validate([
            'identification' => 'required|numeric',
            'password' => 'required|string|min:6',
        ]);

        // Attempt to find user by identification
        $user = User::where('identification', $request->identification)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Check if user has admin or super admin role
            if ($user->role_id == 1 || $user->role_id == 2) { // Assuming 1 = super admin, 2 = admin
                Auth::login($user, $request->filled('remember'));
                $request->session()->regenerate();
                return redirect()->intended(route('admin.dashboard'));
            } else {
                return back()->withErrors([
                    'identification' => 'Vous n\'avez pas les autorisations nécessaires pour accéder à l\'administration.',
                ]);
            }
        }

        return back()->withErrors([
            'identification' => 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements.',
        ]);
    }    /**
     * Show the admin dashboard
     */
    public function dashboard()
    {
        $user = Auth::user();
        
        // Additional security check
        if (!$user || ($user->role_id != 1 && $user->role_id != 2)) {
            return redirect()->route('admin.login');
        }

        return view('admin.enhanced-dashboard', compact('user'));
    }/**
     * Handle admin logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('admin.login')->with('success', 'Vous avez été déconnecté avec succès.');    }    /**
     * Show admin profile
     */
    public function profile()
    {
        $user = Auth::user();
        
        // Additional security check
        if (!$user || ($user->role_id != 1 && $user->role_id != 2)) {
            return redirect()->route('admin.login');
        }
        
        return view('admin.enhanced-dashboard', compact('user'))->with('activeSection', 'profile');
    }

    /**
     * Update admin profile
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'identification' => 'required|numeric|unique:users,identification,' . $user->id,
            'current_password' => 'nullable|string',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        // Check current password if new password is provided
        if ($validated['password']) {
            if (!$validated['current_password'] || !Hash::check($validated['current_password'], $user->password)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Le mot de passe actuel est incorrect.'
                ], 400);
            }
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        unset($validated['current_password'], $validated['password_confirmation']);
        
        $user->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Profil mis à jour avec succès',
            'data' => $user
        ]);
    }

    /**
     * Get users for AJAX requests (for dropdowns)
     */
    public function ajaxUsers()
    {
        try {
            $users = User::select('id', 'name', 'last_name', 'identification')
                ->orderBy('name')
                ->get();

            return response()->json([
                'success' => true,
                'data' => $users,
                'message' => 'Utilisateurs récupérés avec succès'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la récupération des utilisateurs'
            ], 500);
        }
    }
}
