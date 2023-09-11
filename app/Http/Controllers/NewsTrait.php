<?php

declare(strict_types=1);


namespace App\Http\Controllers;

use Faker;

trait NewsTrait 
{
    public function getCategories(int $id = null)
    {
        $categories = [];
        $categoriesCuantity = 5;
        $faker = Faker\Factory::create();

        if ($id === null) {
            for($i = 1; $i < $categoriesCuantity; $i++) {
                $categories[$i] = [
                    'id' => $i,
                    'title' => $faker->text(10),
                    'description' => $faker->text(20),
                ];
            }
            return $categories;
        }
        return [
            'id' => $id,
            'title' => $faker->text(10),
            'description' => $faker->text(20),
        ];
    }

    public function getNews(int $id = null, $category = 'free category')
    {
        $news = [];
        $newsQuantity = 5;
        $faker = Faker\Factory::create();

        if ($id === null) {
            for($i = 1; $i < $newsQuantity; $i++) {
                $news[$i] = [
                    'category' => $category,
                    'id' => $i,
                    'title' => $faker->text(10),
                    'description' => $faker->text(100),
                    'author' => $faker->name(),
                    'created_at' => \now()->format('d-m-Y H:i')
                ];
            }
            return $news;
        }
        return [
            'category' => $category,
            'id' => $id,
            'title' => $faker->text(10),
            'description' => $faker->text(100),
            'author' => $faker->name(),
            'created_at' => \now()->format('d-m-Y H:i')
        ];
    }

}
