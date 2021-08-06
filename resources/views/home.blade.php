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
            <div class="col-md-4">
                <div class="card">
                    <img src="https://images.unsplash.com/photo-1606787366850-de6330128bfc?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$post['title']}}</h5>
                        <p class="card-text">{{$post['body']}}</p>
                        <a href="#" class="btn btn-primary">voir..</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection