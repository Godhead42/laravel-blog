<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Comment;
use App\Models\PostUserLike;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function index()
    {
        $data = [
            'postsCount' => Post::count(),
            'commentsCount' => Comment::count(),
            'likedPostsCount' => PostUserLike::where('user_id', auth()->id())->count(),
        ];

        return view('personal.main.index', compact('data'));
    }

}
