<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('faculties')->insert([
            [
                'name' => 'Pendidikan Diploma Tiga',
                'dean' => 'Arip Budiman, M.Pd',
            ],[
                'name' => 'Pendidikan Vokasi',
                'dean' => 'Yovi Fernando, S.T',
            ],
        ]);
    }
}
