<?php

declare(strict_types=1);


namespace App\Http\Controllers;

use Faker;

trait NewsTrait 
{
    public function getCategories(int $id = null)
    {
        $categories = [];
        $categoriesQuantity = 5;
        $faker = Faker\Factory::create();

        if ($id === null) {
            for($i = 1; $i < $categoriesQuantity; $i++) {
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

    public function getNews(int $news_id = null, $category_id = 1)
    {
        $news = [];
        $newsQuantity = 15;
        $faker = Faker\Factory::create();

        if ($news_id === null) {
            for($i = 1; $i < $newsQuantity; $i++) {
                $news[$i] = [
                    'category_id' => $category_id,
                    'news_id' => $i,
                    'title' => $faker->text(10),
                    'description' => $faker->text(100),
                    'author' => $faker->name(),
                    'created_at' => \now()->format('d-m-Y H:i')
                ];
            }
            return $news;
        }
        return [
            'category_id' => $category_id,
            'news_id' => $news_id,
            'title' => $faker->text(10),
            'description' => $faker->text(100),
            'author' => $faker->name(),
            'created_at' => \now()->format('d-m-Y H:i')
        ];
    }

}
