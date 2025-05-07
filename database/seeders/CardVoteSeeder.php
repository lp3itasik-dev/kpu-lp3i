<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CardVoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('card_votes')->insert([
            [
                'period_id' => 1,
                'user_id' => 3,
                'organization_id' => 1,
            ]
        ]);
    }
}
