<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\roles;

class ListUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all users with their roles';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::with('role')->get();
        
        if ($users->isEmpty()) {
            $this->info('No users found.');
            return;
        }

        $this->info('Users List:');
        $this->line('');
        
        $headers = ['ID', 'Name', 'Last Name', 'Identification', 'Role'];
        $rows = [];
        
        foreach ($users as $user) {
            $rows[] = [
                $user->id,
                $user->name,
                $user->last_name,
                $user->identification,
                $user->role ? $user->role->name : 'No Role'
            ];
        }
        
        $this->table($headers, $rows);
        
        $this->info('Total users: ' . $users->count());
    }
}
