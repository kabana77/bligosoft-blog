<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class AboutController extends Controller
{
    public function index(){
        return view('front.about.index', [
            'categories' => Category::latest()->get(),
            'latest_posts' => Article::where('status','1')->take(3)->get()
        ]);
    }
}
