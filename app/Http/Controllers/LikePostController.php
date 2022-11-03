<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class LikePostController extends Controller
{
    public function store(Post $post)
    {
        $post->likes()->toggle(
            auth()->user()->id
        );

        return response(['ok'], 200);
    }
}
