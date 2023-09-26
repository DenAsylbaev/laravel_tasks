<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\NewsTrait;

class NewsController extends Controller
{
    use NewsTrait;

    public function index()
    {
        // return \view('news.index', [
        //     'news' => $this->getNews(),
        // ]);

        return \view('news.index') -> with([
            'news' => $this->getNews(),
        ]);
    }

    public function show(int $news_id)
    {
        return \view('news.show', [
            'news' => $this->getNews($news_id),
        ]);
    }
}
