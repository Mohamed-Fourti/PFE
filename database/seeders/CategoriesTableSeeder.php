<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => '1',
            'title' => 'évènement',
        ]);
        DB::table('categories')->insert([
            'id' => '2',
            'title' => 'formation',
        ]);
        DB::table('categories')->insert([
            'id' => '3',
            'title' => 'nouveauté',
        ]);
    }
}
