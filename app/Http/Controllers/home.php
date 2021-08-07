<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Support\Str;
use App\Http\Requests\PostRequest;
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

    public function showDetail($slug)
    {
        $post = post::where('slug', $slug)->first();
        return view('show-detail')->with([
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(PostRequest $request)
    {
        if($request->has('image')){
            $file = $request->image;
            $image_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'),$image_name);
        }

        /*  ====== methode 1 ========  
     $post = new post();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->body = $request->body;
        $post->image = 'https://via.placeholder.com/640x480.png/006644?text=new-post';
        $post->save(); */
        /*  //console form//
        dd($request->all()); */

        // =========== methode 2 =========
        post::create([
            'title' =>  $request->title,
            'body' => $request->body,
            'image' => $image_name,
            'slug' => Str::slug($request->title)
        ]);
        return redirect()->route('home')->with([
            'success' => 'article ajouter'
        ]);
    }

    public function edit($slug)
    {
        $post = post::where('slug',$slug)->first();
        return view('edit')->with([
            'post'=> $post
        ]);
    }

    public function update(PostRequest $request,$slug)
    {
        $post = post::where('slug',$slug)->first();
        $post->update([
            'title' =>  $request->title,
            'body' => $request->body,
            'image' => 'https://via.placeholder.com/640x480.png/006644?text=new-post',
            'slug' => Str::slug($request->title)
        ]);
        return redirect()->route('home')->with([
            'success'=> 'article updated'
        ]);
    }

    public function delete($slug)
    {
        $post= post::where('slug',$slug);
        $post->delete();
        return redirect()->route('home')->with([
            'success'=> 'article deleted'
        ]);
    }
}
