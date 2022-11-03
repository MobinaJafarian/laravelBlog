<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class SearchPostController extends Controller
{
    public function show(Request $request)
    {
        $posts = Post::where('title', 'LIKE', "%{$request->search}%")->paginate(1);

        return view('landing', compact('posts'));
    }
}
