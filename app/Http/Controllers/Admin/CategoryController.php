<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;



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
        return \view('admin.categories.create');
    }

    public function store(Request $request)
    {
        // $request->flash();
        // $newCategory = $request->all();
        // $categoriesInStoreArray = [];

        // if (Storage::disk('local')->exists('categories.json')) {
            
        //     $categoriesInStoreJSON = Storage::get('categories.json');
        //     $categoriesInStoreArray = json_decode($categoriesInStoreJSON, true);
        // }
        
        // $categoriesInStoreArray[] = $newCategory;
        // Storage::disk('local')->put('categories.json', json_encode($categoriesInStoreArray));

        // return redirect()->route('admin.categories.create');
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
