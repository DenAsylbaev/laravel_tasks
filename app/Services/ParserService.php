<?php

namespace App\Services;

use App\Models\Category;
use App\Services\Interfaces\Parser;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\Support\Facades\DB;
use App\Models\News;



class ParserService implements Parser
{
    private string $link;

    public function setLink(string $link): Parser
    {
        $this->link = $link;

        return $this;
    }

    public function saveParseData(): void
    {
        $parser = XmlParser::load($this->link);
        
        $newsForSaveInDB = [];
        $categoryForSaveInDB = [];

        //логику отсюда
        $data = $parser->parse([
            'title' => [
                'uses' => 'channel.title',
            ],
            'link' => [
                'uses' => 'channel.link',
            ],
            'description' => [
                'uses' => 'channel.description',
            ],
            'image' => [
                'uses' => 'channel.image.url',
            ],
            'news' => [
                'uses' => 'channel.item[title,link,author,description,pubDate,category,enclosure::url]'
            ],
        ]);
        // dump($data);
        foreach ($data['news'] as $news) {
            $category = Category::firstOrCreate(
                ['title' => $news['category']],
            );

            News::query()->firstOrCreate([
                'category_id' => $category->id,
                'title' => $news['title'],
                'author' => $news['author']? :'НЕТ АВТОРА',
                'description' => $news['description'],
                'created_at' => now(),
                'image' => $news['enclosure::url'],
            ]);        
        }
        // // для категорий
        // for ($i=0; $i < count($data['news']); $i++) {
        //     $category = Category::firstOrCreate(
        //         ['title' => $data['news'][$i]['category']],
        //         // ['description' => $data['news'][$i]['description']],
        //         ['created_at' => now()],
        //     );
        // };
        
        // // для новостей
        // for ($i=0; $i < count($data['news']); $i++) {
        //     $newsForSaveInDB[] = [
        //         'category_id' => Category::where('title', '=', $data['news'][$i]['category'])->firstOrFail()->id,
        //         'title' => $data['news'][$i]['title'],
        //         'author' => $data['news'][$i]['author']? :'НЕТ АВТОРА',
        //         'description' => $data['news'][$i]['description'],
        //         'created_at' => now(),
        //     ];
        // }
        // DB::table('news')->insert($newsForSaveInDB);
    }
}
