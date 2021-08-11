<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\categories;
use Illuminate\Http\Request;


class home extends Controller
{
    //
    public function index()
    {
        $posts = post::latest()->paginate(6);
        return view('home')->with([
            'posts' => $posts
        ]);

      
    }


 


  
}
