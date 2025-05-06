<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CandidateDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('candidate_details')->insert([
            [
                'candidate_id' => 1,
                'name' => 'Anies Baswedan',
                'description' => 'Anies Baswedan adalah seorang politikus dan akademisi asal Indonesia. Ia pernah menjabat sebagai Gubernur DKI Jakarta.',
            ],
            [
                'candidate_id' => 1,
                'name' => 'Muhaimin Iskandar',
                'description' => 'Muhaimin Iskandar adalah seorang politikus Indonesia yang menjabat sebagai Ketua Umum Partai Kebangkitan Bangsa.',
            ],
            [
                'candidate_id' => 2,
                'name' => 'Prabowo Subianto',
                'description' => 'Prabowo Subianto adalah seorang jenderal purnawirawan TNI Angkatan Darat dan politikus Indonesia.',
            ],
            [
                'candidate_id' => 2,
                'name' => 'Gibran Rakabuming Raka',
                'description' => 'Gibran Rakabuming Raka adalah seorang pengusaha dan politikus Indonesia, serta putra sulung Presiden Joko Widodo.',
            ],
            [
                'candidate_id' => 3,
                'name' => 'Ganjar Pranowo',
                'description' => 'Ganjar Pranowo adalah seorang politikus Indonesia yang menjabat sebagai Gubernur Jawa Tengah.',
            ],
            [
                'candidate_id' => 3,
                'name' => 'Mahfud MD',
                'description' => 'Mahfud MD adalah seorang akademisi dan politikus Indonesia yang menjabat sebagai Menteri Koordinator Bidang Politik, Hukum, dan Keamanan.',
            ],
        ]);
    }
}
