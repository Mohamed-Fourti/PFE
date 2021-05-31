<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FichedevœuxTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fichedevœux_o_f_s')->insert([
            'id' => '1',
            'sem' => 'S1',
            'active' => '0',
        ]);
        DB::table('fichedevœux_o_f_s')->insert([
            'id' => '2',
            'sem' => 'S2',
            'active' => '0',
        ]);
    }
}
