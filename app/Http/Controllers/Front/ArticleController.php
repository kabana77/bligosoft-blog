<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    public function index(){
        return view('front.article.index', [
            'articles' => Article::where('status', 1)->latest()->paginate(7),
            'categories' => Category::latest()->get()
        ]);
    }
    
    public function show($slug){
        $articles = Article::where('slug', $slug)->firstOrFail();
        $articles->increment('views');

        return view('front.article.show', [
            'article' => $articles,
            'otherArticles' => Article::where('slug', '!=', $slug)->take(10)->get(),
            'categories' => Category::all()
        ]);
    }
}
