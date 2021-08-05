<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class home extends Controller
{
    //
    public function index($age = null)
    {
        $name = 'kader';
        return view('home')->with([
            'name' => $name,
            'age'=>$age
        ]);
    }
}
