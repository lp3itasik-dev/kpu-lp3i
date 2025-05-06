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
            ],[
                'name' => 'Muhammad Aripin, S.Kom',
                'email' => 'aripin.lp3i@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'O',
                'is_active' => true,
            ],[
                'name' => 'Asep Manarul Hidayah, S.Kom',
                'email' => 'asep.lp3i@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'U',
                'is_active' => true,
            ],
        ]);
    }
}
