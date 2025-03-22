<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();

        $posts = Post::paginate(6);

        return view('category.index', compact('categories', 'posts'));
    }
}
