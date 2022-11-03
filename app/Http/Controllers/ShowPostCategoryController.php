<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class ShowPostCategoryController extends Controller
{
    public function show(Category $category)
    {
        $posts = $category->posts()->paginate();

        return view('landing', compact('posts'));
    }
}
