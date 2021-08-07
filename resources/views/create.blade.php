@extends('master.layout')


@section('title')
publish
@endsection

@section('content')
<div class="row my-4">
    <div class="col-md-8 mx-auto">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    ajouter une publication
                </h3>
            </div>
            <div class="card-body">
                <form action="{{route('store.post')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">chose Image</label>
                        <input type="file" class="form-control" name="image" placeholder="choseImage">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">title</label>
                        <input type="text" class="form-control" name="title" placeholder="title">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control" name="body" rows="3" placeholder="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">
                            poster
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection