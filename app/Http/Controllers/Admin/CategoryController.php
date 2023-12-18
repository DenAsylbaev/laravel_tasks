<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\Admin\Categories\Create;
use App\Http\Requests\Admin\Categories\Edit;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return \view('admin.categories.index', [
            'categories' => $categories,
        ]);    
    }

    public function create()
    {
        $categories = Category::all();
        return \view('admin.categories.create', [
            'categories' => $categories,
        ]);
    }

    public function store(Create $request)
    {
        $data = $request->only(['title', 'description']);
        $categories = new Category($data);
        if ($categories->save()) {
            return redirect()->route('admin.categories.index')->with('success', 'Запись успешно сохранена');
        }

        return back()->with('error', 'Не удалось добавить запись');
    }

    public function show($id)
    {
        //
    }

    public function edit($categories)
    {
        return view('admin.categories.edit', [
            'categories' => $categories        
        ]);    
    }

    public function update(Edit $request, Category $categories)
    {
        $data = $request->only(['title', 'description']);
        $categories->fill($data);
        if ($categories->save()) {
            return redirect()->route('admin.categories.index')->with('success', 'Запись успешно изменена');
        }
        return back()->with('error', 'Не удалось обновить запись');
    }

    public function destroy(Category $categories)
    {
        if ($categories->delete()) {
            return redirect()->route('admin.categories.index')->with('success', 'Запись успешно удалена');
        }
        return back()->with('error', 'Не удалось удалить запись');
    }
}
