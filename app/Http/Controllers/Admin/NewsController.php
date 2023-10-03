<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;



class NewsController extends Controller
{

    public function index()
    {
        $news = News::query()->paginate(10);

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

    public function store(Request $request)
    {

        $data = $request->only(['category_id', 'title', 'author', 'description']);

        $news = new News($data);
        // $request->flash();
        // $addingNews = $request->all();
        // // $file = $request->file('image');
        // // $originalName = $file->getClientOriginalName();

        // DB::table('news')->insert([
        //     'category_id' => $addingNews['category_id'],
        //     'title' => $addingNews['title'],
        //     'author'=> $addingNews['author'],
        //     'description'=> $addingNews['description'],
        //     'created_at'=> now(),
        //  ]);

        // //  Storage::disk('public')->put($originalName, 'Images');

        // return redirect()->route('admin.news.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
