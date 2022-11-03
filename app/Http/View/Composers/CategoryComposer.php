<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Category;

class CategoryComposer
{
  protected $categories;

  public function __construct()
  {
    $this->categories = Category::with('children')->where('category_id', null)->get();
  }

  public function compose(View $view)
  {
    $view->with('categories', $this->categories);
  }
}