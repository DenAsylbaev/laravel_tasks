<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->get();

        return \view('categories.index') -> with([
            'categories' => $categories,
        ]);
    }

    public function show(int $id)
    {
        $categories = DB::table('categories')->find($id);
        return \view('categories.show', [
            'categories' => $categories,
        ]);    }
}
