<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    public function getData(): array
    {
        $quantityNews = 20;
        $news = [];
        $faker = Faker\Factory::create();

        for ($i=0; $i < $quantityNews; $i++) {
            $news[] = [
                'category_id' => $faker->numberBetween(1,3),
                'title' =>  $faker->text(10),
                'author' =>  $faker->text(20),
                'description' =>  $faker->text(20) ,
                'created_at' => now(),
            ];
        }

        return $news;
    }
}
