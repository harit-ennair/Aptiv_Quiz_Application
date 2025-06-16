<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\formateur;
use App\Models\roles;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get role IDs
        $superAdminRole = roles::where('name', 'super admin')->first();
        $adminRole = roles::where('name', 'admin')->first();

        if (!$superAdminRole || !$adminRole) {
            $this->command->error('Roles not found. Please run RolesSeeder first.');
            return;
        }

        // Create Super Admin
        User::updateOrCreate(
            ['identification' => 1],
            [
                'name' => 'harit',
                'last_name' => 'ennair',
                'identification' => 525,
                'password' => Hash::make('azer123'),
                'role_id' => $superAdminRole->id,
            ]
        );

        $this->command->info('Super Admin user created successfully.');

        // Get all formateurs and create admin users for them
        $formateurs = formateur::all();

        if ($formateurs->isEmpty()) {
            $this->command->info('No formateurs found in database.');
            return;
        }

        foreach ($formateurs as $formateur) {
            // Create admin user for each formateur
            User::updateOrCreate(
                ['identification' => $formateur->identification],
                [
                    'name' => $formateur->name,
                    'last_name' => $formateur->last_name,
                    'identification' => $formateur->identification,
                    'password' => Hash::make('password123'), // Default password for formateurs
                    'role_id' => $adminRole->id,
                ]
            );
        }

        $this->command->info('Created admin users for ' . $formateurs->count() . ' formateurs.');
    }
}
