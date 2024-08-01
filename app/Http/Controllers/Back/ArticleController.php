<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('back.article.index', [
            'articles' => Article::with('Category')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.article.create', [
            'categories' => Category::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->validated();

        $file = $request->file('img'); //img
        $filename = uniqid().'.'.$file->getClientOriginalExtension(); // jpeg, jpg
        $file->storeAs('public/back/', $filename); // public/back/123121.jpg

        $data['img'] = $filename;
        $data['slug'] = Str::slug($data['title']);

        Article::create($data);

        return redirect(url('articles'))->with('success', 'A article has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('back.article.show', [
            'article' => Article::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('back.article.update', [
            'article' => Article::find($id),
            'categories' => Category::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, string $id)
    {
        $data = $request->validated();

        if($request->hasFile('img')){
            $file = $request->file('img'); // img
            $filename = uniqid().'.'.$file->getClientOriginalExtension(); // jpeg, jpg
            $file->storeAs('public/back/', $filename); // public/back/123121.jpg
            Storage::delete('public/back/'.$request->oldImg); // public/back/123
            $data['img'] = $filename;
        }else{
            $data['img'] = $request->oldImg;
        }

        Article::find($id)->update($data);

        return redirect(url('articles'))->with('success', 'A article has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Dapatkan artikel berdasarkan id
        $article = Article::find($id);

        // Pastikan artikel tidak null
        if ($article === null) {
            return response()->json([
                'message' => 'Article not found, id= '.$id,
            ], 404);
        }

        // Jika artikel tidak null, lanjutkan penghapusan
        if ($article->img) {
            Storage::delete('public/back/'.$article->img);
        }

        $article->delete();

        return response()->json([
            'message' => 'Article deleted successfully',
        ]);
    }
}
