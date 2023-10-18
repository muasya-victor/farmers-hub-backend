<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Farmer;
use App\Models\Store;
use App\Models\StoreManager;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        {
            //Create two stores and assign each a manager
            Store::create([
                'name' => 'Bora Farms Dairy',
            ]);

            Store::create([
                'name' => 'Tron Tech Dairy Store',
            ]);

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

            StoreManager::create([
                'user_id' => 2
            ]);

            StoreManager::create([
                'user_id' => 3
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

                //mimic the listen event and create farmers
                Farmer::create([
                    'user_id' => $i + 3
                ]);
            }
        }
    }
}
