{{-- hello {{ $name }} {{$age}} --}}
@extends('master.layout')


@section('title')
{{$post->title}}
@endsection

@section('content')
<div class="row my-5">
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-10 mb-4">
                <div class="card h-100">
                    <img src="{{asset('./uploads/'.$post->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{$post->body}}</p>
                    </div>
                </div>
                <a href="{{route('edit.post',$post->slug)}}" class="btn btn-warning">
                    Modifier
                </a>
                <form id="{{$post->id}}" action="{{route('delete.post',$post->slug)}}" method="POST">
                    @csrf
                    @method('delete')
                </form>
                <button
                onclick="event.preventDefault();if(confirm('do yo want to delete this article?'))
                 document.getElementById({{$post->id}}).submit()" type="submit" class="btn btn-danger">
                    delete
                </button>
            </div>
        </div>
    </div>
</div>
@endsection