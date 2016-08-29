<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Slider;
use App\Post;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', [
            'sliders' => Slider::active()->get(),
            'posts' => Post::ofType(Post::TYPE_POST)
                        ->ofStatus(Post::STATUS_PUBLISHED)->limit(6)->get()
        ]);
    }
}
