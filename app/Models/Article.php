<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'title', 'slug', 'desc', 'img', 'views', 'status', 'published'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
