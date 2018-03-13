<?php

use Illuminate\Database\Seeder;

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
            'name' => 'Action',
        ]);

        DB::table('categories')->insert([
            'name' => 'Adventure',
        ]);

        DB::table('categories')->insert([
            'name' => 'Bollywood',
        ]);

        DB::table('categories')->insert([
            'name' => 'Comedy',
        ]);

        DB::table('categories')->insert([
            'name' => 'Fantasy',
        ]);

        DB::table('categories')->insert([
            'name' => 'Mistery',
        ]);

        DB::table('categories')->insert([
            'name' => 'Romance',
        ]);
    }
}
