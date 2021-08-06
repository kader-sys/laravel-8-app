<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class home extends Controller
{
    //
    public function index()
    {
        $posts = post::paginate(6);
        return view('home')->with([
            'posts' => $posts
        ]);
    }

    public function showDetail($slug)
    {
        $post = post::where('slug',$slug)->first();
        return view('show-detail')->with([
            'post' => $post
        ]);
    }
}
