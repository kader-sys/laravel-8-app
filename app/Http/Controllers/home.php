<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class home extends Controller
{
    //
    public function index()
    {
        $posts = [
            [
                'id'=> 1,
                'title'=>'title post 1',
                'body'=> 'body post 1'
            ],
            [
                'id'=> 2,
                'title'=>'title post 2',
                'body'=> 'body post 2'
            ],
            [
                'id'=> 3,
                'title'=>'title post 3',
                'body'=> 'body post 3'
            ]
        ];
        return view('home')->with([
            'posts' => $posts,
        ]);
    }
}
