<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\NewsTrait;

class NewsCategoriesController extends Controller
{
    use NewsTrait;
    //
    public function index()
    {
        return \view('categories.index', [
            'categories' => $this->getCategories(),
        ]);
    }

    public function show(int $id)
    {
        return $this->getCategories($id);
    }
}
