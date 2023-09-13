<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomePageController extends Controller
{
    public function show()
    {
        return "WELCOME TO OUR NEWSPORTAL";
    }
}
