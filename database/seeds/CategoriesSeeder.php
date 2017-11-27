<?php

use Illuminate\Database\Seeder;


class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['categories' => 'Action'],
            ['categories' => 'Adventure'],
            ['categories' => 'Fantasy'],
            ['categories' => 'Comedy'],
            ['categories' => 'thriller'],
            ['categories' => 'Horor']
        ];
        DB::table('categories')->insert($data);
    }
}
