<?php

namespace App\Http\Controllers\Front;
use App\Models\Category;
use App\Models\Article;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $articles = Article::with('category')->latest()->take(10)->get();
        $latest_posts = $articles->take(3);
        $next_posts = $articles->slice(3, 2);
        $side_list_posts = $articles->slice(5, 3);

        return view('front.home.index', [
            'latest_posts' => $latest_posts,
            'next_posts' => $next_posts,
            'side_list_posts' => $side_list_posts
        ]);
    }
}
