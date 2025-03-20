<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $data = [];
        $data['usersCount'] = User::count();
        $data['postsCount'] = Post::count();
        $data['categoriesCount'] = Category::count();
        $data['tagsCount'] = Tag::count();

        return view('admin.main.index', ['data' => $data]);
    }
}
