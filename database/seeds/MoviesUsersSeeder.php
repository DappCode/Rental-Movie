<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MoviesUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        $userId = DB::table('users')->pluck('id')->toArray();
        $moviesId = DB::table('movies')->pluck('id')->toArray();

        foreach(range(1, 50) as $home) {
            DB::table('movie_user')->insert([
                'users_id' => $faker->randomElement($userId),
                'movie_id' => $faker->randomElement($moviesId)
            ]);
        }
    }
}
