<?php

namespace App\Http\Controllers\Front;

use App\Models\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class BlogController extends Controller
{
    public function index()
    {
        $data = [
            'articles' => Content::with('user')->paginate(3),
            'recent_posts' => Content::limit(3)->orderBy('created_at', 'desc')->get(),
            'categories' => Category::all(),
        ];

        return view('front.blog.index')->with(compact('data'));
    }

    public function show($id)
    {
        $data = [
            'article' => Content::with('user')->find($id),
            'categories' => Category::all(),
            'recent_posts' => Content::limit(3)->orderBy('created_at', 'desc')->get(),

        ];
        return view('front.blog.show')->with(compact('data'));
    }

    public function category($categoryId)
    {
        $data = [
            'articles' => Content::with('user')->where('category_id', $categoryId)->paginate(3),
            'recent_posts' => Content::limit(3)->orderBy('created_at', 'desc')->get(),
            'categories' => Category::all(),
        ];
        return view('front.blog.index')->with(compact('data'));
    }
}
