<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VotingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('votings')->insert([
            [
                'card_vote_id' => 1,
                'candidate_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'card_vote_id' => 2,
                'candidate_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'card_vote_id' => 3,
                'candidate_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //
            [
                'card_vote_id' => 4,
                'candidate_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'card_vote_id' => 4,
                'candidate_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'card_vote_id' => 5,
                'candidate_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'card_vote_id' => 5,
                'candidate_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //
            [
                'card_vote_id' => 6,
                'candidate_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'card_vote_id' => 6,
                'candidate_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'card_vote_id' => 7,
                'candidate_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'card_vote_id' => 7,
                'candidate_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //
            [
                'card_vote_id' => 8,
                'candidate_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'card_vote_id' => 8,
                'candidate_id' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'card_vote_id' => 9,
                'candidate_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'card_vote_id' => 9,
                'candidate_id' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //
            [
                'card_vote_id' => 10,
                'candidate_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'card_vote_id' => 10,
                'candidate_id' => 13,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
