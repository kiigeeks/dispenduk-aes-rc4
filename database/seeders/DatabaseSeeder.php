<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        User::create([
            'name' => 'SuperAdmin',
            'email' => 'superadmin@mail.com',
            'password' => bcrypt('123456'),
            'roles' => 'SUPERADMIN',
            'is_active' => true,
        ]);

        User::create([
            'name' => 'Admin 01',
            'email' => 'admin01@mail.com',
            'password' => bcrypt('123456'),
            'roles' => 'ADMIN',
            'is_active' => true,
        ]);

        User::create([
            'name' => 'Admin 02',
            'email' => 'admin02@mail.com',
            'password' => bcrypt('123456'),
            'roles' => 'ADMIN',
            'is_active' => false,
        ]);
    }
}
