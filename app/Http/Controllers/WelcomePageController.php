<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Controllers\NewsTrait;

class WelcomePageController extends Controller
{
    // use NewsTrait;
    //
    // public function index()
    // {
    //     // dd();
    //     // return $this->getNews();
    //     return \view('news.index', [
    //         'news' => $this->getNews(),
    //     ]);
    // }

    public function show()
    {
        return "WELCOME TO OUR NEWSPORTAL";
    }
}
