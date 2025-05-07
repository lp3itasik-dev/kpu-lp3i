<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('periods')->insert([
            [
                'name' => '2025',
                'description' => 'Pemilihan Umum 2025',
                'dateofvote' => now()->addDays(30),
            ],
            [
                'name' => '2026',
                'description' => 'Pemilihan Umum 2026',
                'dateofvote' => now()->addDays(60),
            ],
            [
                'name' => '2027',
                'description' => 'Pemilihan Umum 2027',
                'dateofvote' => now()->addDays(90),
            ]
        ]);
    }
}
