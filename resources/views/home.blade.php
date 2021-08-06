{{-- hello {{ $name }} {{$age}} --}}
@extends('master.layout')


@section('title')
home
@endsection

@section('content')
<div class="row my-5">
    <div class="col-md-8">
        <div class="row">
            @foreach ($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{asset($post->image)}}"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{Str::limit($post->body,100)}}</p>
                        <a href="#" class="btn btn-primary">voir..</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{$posts->links()}}
        </div>
    </div>
</div>
@endsection