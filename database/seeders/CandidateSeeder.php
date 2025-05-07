<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('candidates')->insert([
            [
                'period_id' => 1,
                'organization_id' => 1,
                'name' => 'AMIN',
                'description' => 'AMIN adalah Anies Baswedan dan Muhaimin Iskandar',
                'vision' => 'Mewujudkan organisasi yang lebih baik',
                'mision' => 'Meningkatkan kualitas organisasi',
                'logo' => 'https://example.com/logo1.png',
                'video' => 'https://example.com/video1.mp4',
                'is_active' => true,
            ],[
                'period_id' => 1,
                'organization_id' => 1,
                'name' => 'PRAGIB',
                'description' => 'PRAGIB adalah Prabowo Subianto dan Gibran Rakabuming Raka',
                'vision' => 'Mewujudkan organisasi yang lebih baik',
                'mision' => 'Meningkatkan kualitas organisasi',
                'logo' => 'https://example.com/logo1.png',
                'video' => 'https://example.com/video1.mp4',
                'is_active' => true,
            ],[
                'period_id' => 1,
                'organization_id' => 1,
                'name' => 'GANMAP',
                'description' => 'GANMAP adalah Ganjar Pranowo dan Mahfud MD',
                'vision' => 'Mewujudkan organisasi yang lebih baik',
                'mision' => 'Meningkatkan kualitas organisasi',
                'logo' => 'https://example.com/logo1.png',
                'video' => 'https://example.com/video1.mp4',
                'is_active' => true,
            ],
        ]);
    }
}
