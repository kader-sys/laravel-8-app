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
                    <img src="{{asset($post->image)}}"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{$post->body}}</p>
                    </div>
                </div>
                <a href="{{route('edit.post',$post->slug)}}" class="btn btn-warning">
                    Modifier
                </a>
            </div>
        </div>
    </div>
</div>
@endsection