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
            CREATE VIEW view_card_vote_totals_by_period_organization AS
            SELECT
                card_votes.period_id,
                periods.name AS period_name,
                card_votes.organization_id,
                organizations.name AS organization_name,
                COUNT(*) AS total
            FROM card_votes
            JOIN organizations ON organizations.id = card_votes.organization_id
            JOIN periods ON periods.id = card_votes.period_id
            GROUP BY card_votes.organization_id, card_votes.period_id, periods.name, organizations.name
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_card_vote_totals_by_period_organization");
    }
};
