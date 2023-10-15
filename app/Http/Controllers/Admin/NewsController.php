<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\Create;
use App\Http\Requests\Admin\News\Edit;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;



class NewsController extends Controller
{

    public function index()
    {
        $news = News::query()->get();

        return \view('admin.news.index', [
            'newsList' => $news,
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return \view('admin.news.create', [
            'categories' => $categories,
        ]);
    }

    public function store(Create $request)
    {
        $data = $request->only(['category_id', 'title', 'author', 'description']);
        $news = new News($data);
        if ($news->save()) {
            return redirect()->route('admin.news.index')->with('success', 'Запись успешно сохранена');
        }

        return back()->with('error', 'Не удалось добавить запись');
    }

    public function show($id)
    {
        //
    }

    public function edit($news)
    {
        $categories = Category::all();
        return view('admin.news.edit', [
            'categories' => $categories,
            'news' => $news,
        ]);    
    }

    public function update(Edit $request, News $news)
    {   
        $data = $request->only(['category_id', 'title', 'author', 'description']);
        $news->fill($data);

        if ($news->save()) {
            return redirect()->route('admin.news.index')->with('success', 'Запись успешно изменена');
        }
        return back()->with('error', 'Не удалось обновить запись');
    }

    public function destroy(News $news)
    {
        if ($news->delete()) {
            return redirect()->route('admin.news.index')->with('success', 'Запись успешно удалена');
        }
        return back()->with('error', 'Не удалось удалить запись');
    }
}
