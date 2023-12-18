<?php

declare(strict_types=1);

namespace App\Http\Controllers;
use App\Models\News;
use App\Models\Category;


class NewsController extends Controller
{
    public function index(Category $categories)
    {
        $news = News::query()
            ->where('category_id', $categories->id)
            ->paginate(6);

        return \view('news.index') -> with([
            'news' => $news,
        ]);
    }

    public function show(News $news)
    {

        return \view('news.show', [
            'news' => $news,
        ]);
    }
}
