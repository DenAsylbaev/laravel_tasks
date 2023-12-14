<?php

namespace App\Services;

use App\Models\Category;
use App\Services\Interfaces\Parser;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\Support\Facades\DB;



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

        // для категорий
        for ($i=0; $i < count($data['news']); $i++) {
            $category = Category::firstOrCreate(
                ['title' => $data['news'][$i]['category']],
                // ['description' => $data['news'][$i]['description']],
                ['created_at' => now()],
            );
        };
        
        // для новостей
        for ($i=0; $i < count($data['news']); $i++) {
            // var_dump($data['news'][$i]['author']);
            $newsForSaveInDB[] = [
                'category_id' => Category::where('title', '=', $data['news'][$i]['category'])->firstOrFail()->id,
                'title' => $data['news'][$i]['title'],
                'author' => $data['news'][$i]['author']? :'НЕТ АВТОРА',// добавить проверку
                'description' => $data['news'][$i]['description'],
                'created_at' => now(),
            ];
        }
        DB::table('news')->insert($newsForSaveInDB);
    }
}
