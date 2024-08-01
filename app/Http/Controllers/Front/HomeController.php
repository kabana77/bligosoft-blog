<?php

namespace App\Http\Controllers\Front;
use App\Models\Category;
use App\Models\Article;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $articles = Article::with('category')->where('status','1')->latest()->take(10)->get();
        $latest_posts = $articles->where('status','1')->take(3);
        $next_posts = $articles->where('status','1')->slice(3, 2);
        $side_list_posts = $articles->where('status','1')->slice(5, 3);

        return view('front.home.index', [
            'latest_posts' => $latest_posts,
            'next_posts' => $next_posts,
            'side_list_posts' => $side_list_posts,
            'categories' => Category::all()
        ]);
    }
}
