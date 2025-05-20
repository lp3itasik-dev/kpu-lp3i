<?php

namespace App\Imports;

use App\Models\CardVote;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CardVotesImport implements ToCollection, WithHeadingRow {
    protected $period_id;
    protected $organization_id;

    public function __construct( $period_id, $organization_id ) {
        $this->period_id = $period_id;
        $this->organization_id = $organization_id;
    }

    public function collection( Collection $rows ) {
        function createUser( $user ) {
            $user = User::updateOrCreate( [
                'email' => $user[ 'email' ],
            ], [
                'name' => $user[ 'name' ],
                'email' => $user[ 'email' ],
                'password' => bcrypt( $user[ 'password' ] ),
                'role' => 'U',
                'is_active' => true,
            ] );

            return $user;
        }

        foreach ( $rows as $key => $row ) {
            if ( empty( trim( $row[ 'email' ] ?? '' ) ) ) {
                continue;
            }
            if ( empty( $row[ 'name' ] ) || empty( $row[ 'password' ] ) ) {
                continue;
            }
            
            $user = createUser( $row );

            CardVote::updateOrCreate( [
                'user_id' => $user->id,
                'period_id' => $this->period_id,
                'organization_id' => $this->organization_id,
            ], [
                'user_id' => $user->id,
                'period_id' => $this->period_id,
                'organization_id' => $this->organization_id,
            ] );
        }
    }
}
