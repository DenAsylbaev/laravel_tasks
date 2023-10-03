<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return \view('categories.index') -> with([
            'categories' => $categories,
        ]);
    }

    public function show(Category $categories)
    {
        return \view('categories.show', [
            'categories' => $categories,
        ]);    
    }
}
