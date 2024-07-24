<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($slugCategory){
        return view('front.category.index', [
            'articles' => Article::whereHas('Category', function($q) use ($slugCategory){
                $q->where('slug', $slugCategory);
            })->latest()->paginate(9),
            'categories' => Category::where('name', '!=', $slugCategory )->latest()->get()
        ]);
    }
}
