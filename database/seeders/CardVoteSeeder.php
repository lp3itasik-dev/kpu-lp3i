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
            ],[
                'period_id' => 1,
                'user_id' => 4,
                'organization_id' => 1,
            ],[
                'period_id' => 1,
                'user_id' => 5,
                'organization_id' => 1,
            ],[
                'period_id' => 1,
                'user_id' => 6,
                'organization_id' => 2,
            ],[
                'period_id' => 1,
                'user_id' => 7,
                'organization_id' => 2,
            ],[
                'period_id' => 1,
                'user_id' => 8,
                'organization_id' => 3,
            ],[
                'period_id' => 1,
                'user_id' => 9,
                'organization_id' => 3,
            ],[
                'period_id' => 1,
                'user_id' => 10,
                'organization_id' => 4,
            ],[
                'period_id' => 1,
                'user_id' => 11,
                'organization_id' => 4,
            ],[
                'period_id' => 1,
                'user_id' => 12,
                'organization_id' => 5,
            ],
        ]);
    }
}
