<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            // Create an admin user
            User::create([
                'first_name' => 'Admin',
                'last_name' => 'User',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
                'user_type' => 'admin',
            ]);

            // Create two managers
            User::create([
                'first_name' => 'Manager',
                'last_name' => 'User1',
                'email' => 'manager1@example.com',
                'password' => bcrypt('password'),
                'user_type' => 'store_manager',
            ]);

            User::create([
                'first_name' => 'Manager',
                'last_name' => 'User2',
                'email' => 'manager2@example.com',
                'password' => bcrypt('password'),
                'user_type' => 'store_manager',
            ]);

            // Create six farmers
            for ($i = 1; $i <= 6; $i++) {
                User::create([
                    'first_name' => 'Farmer',
                    'last_name' => 'User' . $i,
                    'email' => 'farmer' . $i . '@example.com',
                    'password' => bcrypt('password'),
                    'user_type' => 'farmer',
                ]);
            }
        }
    }
}
