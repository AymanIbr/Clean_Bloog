<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminConteoller extends Controller
{
    public function index(){
        $post_Count = Post::count();
        $user_count = User::count();
        $category_count = Category::count();
        return view('admin.index', compact('post_Count','user_count','category_count'));
    }
}
