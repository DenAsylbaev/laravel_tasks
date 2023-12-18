<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ParserService;
use App\Services\Interfaces\Parser;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;
use App\Models\News;


class ParserController extends Controller
{
    public function __invoke(Request $request, Parser $parserService)
    {

        $url = "https://lenta.ru/rss";
        // $url2 = "https://news.rambler.ru/rss/tech/";

        $parserService->setLink($url)->saveParseData();

        $news = News::query()->get();

        return \view('admin.news.index', [
            'newsList' => $news,
        ]);
    }
}
