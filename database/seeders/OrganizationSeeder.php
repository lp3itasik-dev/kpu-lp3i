<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table( 'organizations' )->insert( [
            [
                'program_id' => null,
                'name' => 'Badan Eksekutif Mahasiswa',
                'logo' => 'https://example.com/logo1.png',
                'description' => 'Badan Eksekutif Mahasiswa adalah organisasi yang bertujuan untuk meningkatkan kualitas mahasiswa dalam bidang kepemimpinan dan organisasi.',
                'is_active' => true,
            ],
            [
                'program_id' => 1,
                'name' => 'Himpunan Mahasiswa Manajemen Keuangan Perbankan',
                'logo' => 'https://example.com/logo1.png',
                'description' => 'Himpunan Mahasiswa Manajemen Keuangan Perbankan adalah organisasi yang bertujuan untuk meningkatkan kualitas mahasiswa dalam bidang keuangan dan perbankan.',
                'is_active' => true,
            ], [
                'program_id' => 2,
                'name' => 'Himpunan Mahasiswa Manajemen Pemasaran',
                'logo' => 'https://example.com/logo1.png',
                'description' => 'Himpunan Mahasiswa Manajemen Pemasaran adalah organisasi yang bertujuan untuk meningkatkan kualitas mahasiswa dalam bidang pemasaran.',
                'is_active' => true,
            ], [
                'program_id' => 3,
                'name' => 'Himpunan Mahasiswa Teknik Otomotif',
                'logo' => 'https://example.com/logo1.png',
                'description' => 'Himpunan Mahasiswa Teknik Otomotif adalah organisasi yang bertujuan untuk meningkatkan kualitas mahasiswa dalam bidang otomotif.',
                'is_active' => true,
            ], [
                'program_id' => 4,
                'name' => 'Himpunan Mahasiswa Teknik Informatika',
                'logo' => 'https://example.com/logo1.png',
                'description' => 'Himpunan Mahasiswa Teknik Informatika adalah organisasi yang bertujuan untuk meningkatkan kualitas mahasiswa dalam bidang informatika.',
                'is_active' => true,
            ],
        ] );
    }
}
