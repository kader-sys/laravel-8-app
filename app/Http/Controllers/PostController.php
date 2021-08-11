<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::latest()->paginate(6);
        return view('home')->with([
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('image')) {
            $file = $request->image;
            $image_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $image_name);
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
            'slug' => Str::slug($request->title),
            'user_id'=> auth()->user()->id        
        ]);
        return redirect()->route('home')->with([
            'success' => 'article ajouter'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        return view('show-detail')->with([
            'post'=> $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
       // $post = post::where('slug', $slug)->first();
        return view('edit')->with([
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
    public function update(PostRequest $request, $slug)
    {
        $post = post::where('slug', $slug)->first();
        if ($request->has('image')) {
            $file = $request->image;
            $image_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $image_name);
            unlink(public_path('uploads') . '/' . $post->image);
            $post->image = $image_name;
        }
        $post->update([
            'title' =>  $request->title,
            'body' => $request->body,
            'image' => $post->image,
            'slug' => Str::slug($request->title),
            'user_id'=> auth()->user()->id        
        ]);
        return redirect()->route('home')->with([
            'success' => 'article updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        unlink(public_path('uploads') . '/' . $post->image);
        $post->delete();
        return redirect()->route('home')->with([
            'success' => 'article deleted'
        ]);
    }

}
