@extends('layouts.app')

@section('title', 'Connexion Administrateur - Aptiv')

@section('content')
<section class="min-h-screen bg-gradient-to-br from-gray-900 via-black to-gray-800 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <!-- Header -->
        <div class="text-center">
            <img src="{{ asset('images/aptiv-official.svg') }}" alt="Aptiv" class="mx-auto h-12 w-auto mb-8">
            <h2 class="text-3xl font-bold text-white mb-2">ADMIN PORTAL</h2>
            <p class="text-gray-400">Accès réservé aux administrateurs</p>
        </div>

        <!-- Login Form -->
        <div class="bg-white rounded-lg shadow-xl p-8">
            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-4 p-4 text-green-700 bg-green-100 border border-green-300 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Error Messages -->
            @if($errors->any())
                <div class="mb-4 p-4 text-red-700 bg-red-100 border border-red-300 rounded-md">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login') }}" class="space-y-6">
                @csrf
                
                <!-- Identification Field -->
                <div>
                    <label for="identification" class="block text-sm font-medium text-gray-700 mb-2">
                        Numéro d'identification
                    </label>
                    <input 
                        type="number" 
                        id="identification" 
                        name="identification" 
                        value="{{ old('identification') }}"
                        required 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-aptiv-orange-500 focus:border-aptiv-orange-500 @error('identification') border-red-500 @enderror"
                        placeholder="Entrez votre numéro d'identification"
                    >
                    @error('identification')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                        Mot de passe
                    </label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        required 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-aptiv-orange-500 focus:border-aptiv-orange-500 @error('password') border-red-500 @enderror"
                        placeholder="Entrez votre mot de passe"
                    >
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input 
                        type="checkbox" 
                        id="remember" 
                        name="remember" 
                        class="h-4 w-4 text-aptiv-orange-600 focus:ring-aptiv-orange-500 border-gray-300 rounded"
                    >
                    <label for="remember" class="ml-2 block text-sm text-gray-700">
                        Se souvenir de moi
                    </label>
                </div>

                <!-- Submit Button -->
                <div>
                    <button 
                        type="submit" 
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-aptiv-orange-600 hover:bg-aptiv-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-aptiv-orange-500 transition-colors duration-200"
                    >
                        Se connecter
                    </button>
                </div>
            </form>

            <!-- Footer -->
            <div class="mt-6 text-center">
                <a href="{{ route('home') }}" class="text-sm text-gray-600 hover:text-aptiv-orange-600 transition-colors">
                    ← Retour à l'accueil
                </a>
            </div>
        </div>

        <!-- Security Notice -->
        <div class="text-center text-xs text-gray-500">
            <p>Cette zone est réservée aux administrateurs autorisés.</p>
            <p>Toutes les connexions sont surveillées et enregistrées.</p>
        </div>
    </div>
</section>
@endsection
