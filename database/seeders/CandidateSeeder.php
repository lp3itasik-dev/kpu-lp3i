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
                'is_active' => true,
            ],[
                'period_id' => 1,
                'organization_id' => 1,
                'name' => 'PRAGIB',
                'description' => 'PRAGIB adalah Prabowo Subianto dan Gibran Rakabuming Raka',
                'vision' => 'Mewujudkan organisasi yang lebih baik',
                'mision' => 'Meningkatkan kualitas organisasi',
                'is_active' => true,
            ],[
                'period_id' => 1,
                'organization_id' => 1,
                'name' => 'GANMAP',
                'description' => 'GANMAP adalah Ganjar Pranowo dan Mahfud MD',
                'vision' => 'Mewujudkan organisasi yang lebih baik',
                'mision' => 'Meningkatkan kualitas organisasi',
                'is_active' => true,
            ],
            [
                'period_id' => 1,
                'organization_id' => 2,
                'name' => 'HIMA MKP 01',
                'description' => 'AMIN adalah Anies Baswedan dan Muhaimin Iskandar',
                'vision' => 'Mewujudkan organisasi yang lebih baik',
                'mision' => 'Meningkatkan kualitas organisasi',
                'is_active' => true,
            ],[
                'period_id' => 1,
                'organization_id' => 2,
                'name' => 'HIMA MKP 02',
                'description' => 'PRAGIB adalah Prabowo Subianto dan Gibran Rakabuming Raka',
                'vision' => 'Mewujudkan organisasi yang lebih baik',
                'mision' => 'Meningkatkan kualitas organisasi',
                'is_active' => true,
            ],[
                'period_id' => 1,
                'organization_id' => 2,
                'name' => 'HIMA MKP 03',
                'description' => 'GANMAP adalah Ganjar Pranowo dan Mahfud MD',
                'vision' => 'Mewujudkan organisasi yang lebih baik',
                'mision' => 'Meningkatkan kualitas organisasi',
                'is_active' => true,
            ],[
                'period_id' => 1,
                'organization_id' => 3,
                'name' => 'HIMA MP 01',
                'description' => 'AMIN adalah Anies Baswedan dan Muhaimin Iskandar',
                'vision' => 'Mewujudkan organisasi yang lebih baik',
                'mision' => 'Meningkatkan kualitas organisasi',
                'is_active' => true,
            ],[
                'period_id' => 1,
                'organization_id' => 3,
                'name' => 'HIMA MP 02',
                'description' => 'PRAGIB adalah Prabowo Subianto dan Gibran Rakabuming Raka',
                'vision' => 'Mewujudkan organisasi yang lebih baik',
                'mision' => 'Meningkatkan kualitas organisasi',
                'is_active' => true,
            ],[
                'period_id' => 1,
                'organization_id' => 3,
                'name' => 'HIMA MP 03',
                'description' => 'GANMAP adalah Ganjar Pranowo dan Mahfud MD',
                'vision' => 'Mewujudkan organisasi yang lebih baik',
                'mision' => 'Meningkatkan kualitas organisasi',
                'is_active' => true,
            ],[
                'period_id' => 1,
                'organization_id' => 4,
                'name' => 'HIMA TO 01',
                'description' => 'AMIN adalah Anies Baswedan dan Muhaimin Iskandar',
                'vision' => 'Mewujudkan organisasi yang lebih baik',
                'mision' => 'Meningkatkan kualitas organisasi',
                'is_active' => true,
            ],[
                'period_id' => 1,
                'organization_id' => 4,
                'name' => 'HIMA TO 02',
                'description' => 'PRAGIB adalah Prabowo Subianto dan Gibran Rakabuming Raka',
                'vision' => 'Mewujudkan organisasi yang lebih baik',
                'mision' => 'Meningkatkan kualitas organisasi',
                'is_active' => true,
            ],[
                'period_id' => 1,
                'organization_id' => 4,
                'name' => 'HIMA TO 03',
                'description' => 'GANMAP adalah Ganjar Pranowo dan Mahfud MD',
                'vision' => 'Mewujudkan organisasi yang lebih baik',
                'mision' => 'Meningkatkan kualitas organisasi',
                'is_active' => true,
            ],[
                'period_id' => 1,
                'organization_id' => 5,
                'name' => 'HIMA TI 01',
                'description' => 'AMIN adalah Anies Baswedan dan Muhaimin Iskandar',
                'vision' => 'Mewujudkan organisasi yang lebih baik',
                'mision' => 'Meningkatkan kualitas organisasi',
                'is_active' => true,
            ],[
                'period_id' => 1,
                'organization_id' => 5,
                'name' => 'HIMA TI 02',
                'description' => 'PRAGIB adalah Prabowo Subianto dan Gibran Rakabuming Raka',
                'vision' => 'Mewujudkan organisasi yang lebih baik',
                'mision' => 'Meningkatkan kualitas organisasi',
                'is_active' => true,
            ],[
                'period_id' => 1,
                'organization_id' => 5,
                'name' => 'HIMA TI 03',
                'description' => 'GANMAP adalah Ganjar Pranowo dan Mahfud MD',
                'vision' => 'Mewujudkan organisasi yang lebih baik',
                'mision' => 'Meningkatkan kualitas organisasi',
                'is_active' => true,
            ],
        ]);
    }
}
