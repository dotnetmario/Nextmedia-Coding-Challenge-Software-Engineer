<?php

namespace Database\Seeders;

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
        \App\Models\Category::factory(3)->create()->each(function ($c){
            $c->products()->attach(\App\Models\Product::factory(5)->create()->each(function($p) {
                return $p->id;
            }));
        });
    }
}
