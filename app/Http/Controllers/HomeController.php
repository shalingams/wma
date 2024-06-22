<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $events =
        Event::latest()->take(5)->get();
        $news =
        News::latest()->take(4)->get();
        return view('home.index', [
            'events' => $events,
            'news' => $news
        ]);
    }
}
