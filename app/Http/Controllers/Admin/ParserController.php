<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\Parser;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Resource;


class ParserController extends Controller
{
    public function __invoke(Request $request, Parser $parserService)
    {
        $resouces = Resource::all()->toArray();
        $urls = [];
        foreach ($resouces as $resouces) {
            $urls[] = $resouces['url'];
        }

        foreach ($urls as $url) {
            $parserService->setLink($url)->saveParseData();
            // dispatch(new NewsParsingJob($url));
        }

        $news = News::query()->get();

        return \view('admin.news.index', [
            'newsList' => $news,
        ]);
    }
}
