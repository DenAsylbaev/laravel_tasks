<?php

declare(strict_types=1);

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
// use PDO;
// use PDOStatement;


class NewsController extends Controller
{
    public function index()
    {
        // $db = new PDO ("mysql:host=mysql;port=3306;dbname:mysql",
        // "user",
        // "password");

        $news = DB::table('news')->get();
        return \view('news.index') -> with([
            'news' => $news,
        ]);
    }

    public function show(int $id)
    {
        $news = DB::table('news')->find($id);
        return \view('news.show', [
            'news' => $news,
        ]);
    }
}
