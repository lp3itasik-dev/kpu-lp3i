<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Administrator',
                'email' => 'lp3itasik@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'A',
                'is_active' => true,
            ],
            [
                'name' => 'Officer',
                'email' => 'officer@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'O',
                'is_active' => true,
            ],
            [
                'name' => 'User 1',
                'email' => 'userone@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'U',
                'is_active' => true,
            ],
            [
                'name' => 'User 2',
                'email' => 'usertwo@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'U',
                'is_active' => true,
            ],
            [
                'name' => 'User 3',
                'email' => 'userthree@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'U',
                'is_active' => true,
            ],
            [
                'name' => 'User 4',
                'email' => 'userfour@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'U',
                'is_active' => true,
            ],
            [
                'name' => 'User 5',
                'email' => 'userfive@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'U',
                'is_active' => true,
            ],
            [
                'name' => 'User 6',
                'email' => 'usersix@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'U',
                'is_active' => true,
            ],
            [
                'name' => 'User 7',
                'email' => 'userseven@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'U',
                'is_active' => true,
            ],
            [
                'name' => 'User 8',
                'email' => 'usereight@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'U',
                'is_active' => true,
            ],
            [
                'name' => 'User 9',
                'email' => 'usernine@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'U',
                'is_active' => true,
            ],
            [
                'name' => 'User 10',
                'email' => 'userten@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'U',
                'is_active' => true,
            ]
        ]);
    }
}
