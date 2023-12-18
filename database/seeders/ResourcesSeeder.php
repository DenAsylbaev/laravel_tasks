<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resources')->insert($this->getData());
    }

   public function getData(): array
   {
       return [
           [
                'url' => "https://lenta.ru/rss",
           ],
           [
                'url' => "https://news.rambler.ru/rss/tech/",
            ],
            [
                'url' => "https://news.rambler.ru/rss/world/",
            ],
            [
                'url' => "https://news.rambler.ru/rss/games/",
            ],
            [
                'url' => "https://news.rambler.ru/rss/starlife/",
            ],
       ];
   }
}
