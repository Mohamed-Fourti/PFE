<?php

namespace Database\Seeders;

use App\Http\Controllers\Admin\Publication\CategoriesController;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(LaratrustSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(FichedevœuxTableSeeder::class);
    }
}
