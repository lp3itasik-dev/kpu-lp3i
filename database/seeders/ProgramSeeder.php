<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('programs')->insert([
            [
                'faculty_id' => 1,
                'name' => 'D3 Manajemen Keuangan Perbankan',
                'head' => 'Monika Sutarsari, S.E., M.M',
                'is_active' => true,
            ],[
                'faculty_id' => 1,
                'name' => 'D3 Manajemen Pemasaran',
                'head' => 'Ernawati, S.Pd., M.M',
                'is_active' => true,
            ],[
                'faculty_id' => 2,
                'name' => 'Teknik Otomotif',
                'head' => 'Yovi Fernando, S.T',
                'is_active' => true,
            ],[
                'faculty_id' => 2,
                'name' => 'Teknik Informatika',
                'head' => 'Muhammad Aripin, S.Kom',
                'is_active' => true,
            ],
        ]);
    }
}
