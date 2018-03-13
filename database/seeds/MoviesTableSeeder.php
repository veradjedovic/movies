<?php

use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movies')->insert([
            'name' => 'The Stolen',
            'category_id' => '1',
            'year' => '2017'
        ]);

        DB::table('movies')->insert([
            'name' => 'The Commuter',
            'category_id' => '1',
            'year' => '2018'
        ]);

        DB::table('movies')->insert([
            'name' => 'Black Panther',
            'category_id' => '1',
            'year' => '2018'
        ]);

        DB::table('movies')->insert([
            'name' => 'Jungle',
            'category_id' => '1',
            'year' => '2017'
        ]);

        DB::table('movies')->insert([
            'name' => 'Wolf Warrior',
            'category_id' => '1',
            'year' => '2015'
        ]);

        DB::table('movies')->insert([
            'name' => 'Divergent',
            'category_id' => '2',
            'year' => '2014'
        ]);

        DB::table('movies')->insert([
            'name' => 'Hercules',
            'category_id' => '2',
            'year' => '2014'
        ]);

        DB::table('movies')->insert([
            'name' => 'The Hobbit: The Desolation Of Smaug',
            'category_id' => '2',
            'year' => '2013'
        ]);

        DB::table('movies')->insert([
            'name' => 'Insurgent',
            'category_id' => '2',
            'year' => '2015'
        ]);

        DB::table('movies')->insert([
            'name' => 'The Legend Of Hercules',
            'category_id' => '2',
            'year' => '2014'
        ]);

        DB::table('movies')->insert([
            'name' => 'Players',
            'category_id' => '3',
            'year' => '2012'
        ]);

        DB::table('movies')->insert([
            'name' => 'Milenge Milenge',
            'category_id' => '3',
            'year' => '2010'
        ]);

        DB::table('movies')->insert([
            'name' => 'Heroine',
            'category_id' => '3',
            'year' => '2012'
        ]);

        DB::table('movies')->insert([
            'name' => 'Agent Vinod',
            'category_id' => '3',
            'year' => '2012'
        ]);

        DB::table('movies')->insert([
            'name' => 'Alone',
            'category_id' => '3',
            'year' => '2015'
        ]);

        DB::table('movies')->insert([
            'name' => 'The Dictator',
            'category_id' => '4',
            'year' => '2012'
        ]);

        DB::table('movies')->insert([
            'name' => 'Beautiful Girls',
            'category_id' => '4',
            'year' => '1996'
        ]);

        DB::table('movies')->insert([
            'name' => 'Bring It On',
            'category_id' => '4',
            'year' => '2000'
        ]);

        DB::table('movies')->insert([
            'name' => 'Project X',
            'category_id' => '4',
            'year' => '2012'
        ]);

        DB::table('movies')->insert([
            'name' => 'Jersey Girl',
            'category_id' => '4',
            'year' => '2004'
        ]);

        DB::table('movies')->insert([
            'name' => 'The Hobbit: An Unexpected Jurney',
            'category_id' => '5',
            'year' => '2012'
        ]);

        DB::table('movies')->insert([
            'name' => 'The Lord Of The Rings: The Fellowship Of',
            'category_id' => '5',
            'year' => '2001'
        ]);

        DB::table('movies')->insert([
            'name' => 'The Lord Of The Rings: The Two Towers',
            'category_id' => '5',
            'year' => '2002'
        ]);

        DB::table('movies')->insert([
            'name' => 'Harry Poter And The Chamber Of Secret',
            'category_id' => '5',
            'year' => '2002'
        ]);

        DB::table('movies')->insert([
            'name' => 'Harry Poter And The Order Of The Phoenix',
            'category_id' => '5',
            'year' => '2007'
        ]);

        DB::table('movies')->insert([
            'name' => 'Ghost Ship',
            'category_id' => '6',
            'year' => '2002'
        ]);

        DB::table('movies')->insert([
            'name' => 'The Resident',
            'category_id' => '6',
            'year' => '2011'
        ]);

        DB::table('movies')->insert([
            'name' => 'Now You See Me',
            'category_id' => '6',
            'year' => '2013'
        ]);

        DB::table('movies')->insert([
            'name' => 'The Maze Runner',
            'category_id' => '6',
            'year' => '2014'
        ]);

        DB::table('movies')->insert([
            'name' => 'Shutter Island',
            'category_id' => '6',
            'year' => '2010'
        ]);

        DB::table('movies')->insert([
            'name' => 'Evening',
            'category_id' => '7',
            'year' => '2007'
        ]);

        DB::table('movies')->insert([
            'name' => 'Tengo Ganas De Ti',
            'category_id' => '7',
            'year' => '2012'
        ]);

        DB::table('movies')->insert([
            'name' => 'Match Point',
            'category_id' => '7',
            'year' => '2005'
        ]);

        DB::table('movies')->insert([
            'name' => 'How To Lose Friends & Alienate People',
            'category_id' => '7',
            'year' => '2008'
        ]);

        DB::table('movies')->insert([
            'name' => 'The Vow',
            'category_id' => '7',
            'year' => '2012'
        ]);
    }
}
