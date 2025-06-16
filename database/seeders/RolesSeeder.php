<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\roles;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'super admin'],
            ['name' => 'admin'],
            ['name' => 'employee']
        ];

        foreach ($roles as $role) {
            roles::updateOrCreate(
                ['name' => $role['name']],
                $role
            );
        }
    }
}
