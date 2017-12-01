<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        $dataCategories = DB::table('categories')->pluck('id')->toArray();
    
        foreach(range(1, 50) as $home) {
            DB::table('movies')->insert([        
                'category_id' => $faker->randomElement($dataCategories),
                'title' => $faker->name,
                'year' => $faker->year($max = 'now'),
                'description' => $faker->text
            ]);
        }

    }
}
