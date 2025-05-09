<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            CREATE VIEW view_vote_totals_by_period_candidate AS SELECT
                candidates.period_id AS period_id,
                periods.name AS period_name,
                candidates.id AS candidate_id,
                candidates.name AS candidate_name,
                COUNT(votings.id) AS total
            FROM candidates
            LEFT JOIN votings ON votings.candidate_id = candidates.id
            LEFT JOIN periods ON periods.id = candidates.period_id
            GROUP BY candidate_id, candidate_name, period_id, period_name;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_vote_totals_by_period_candidate");
    }
};
