@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card p-3">

            <h1>{{ $post->title }}</h1>
            <p> {{ $post->content }}</p>

            <div class="d-flex justify-content-end">
                <a class="btn btn-secondary" href="{{ route('admin.posts.index') }}">Go Back</a>

            </div>


        </div>
    </div>


@endsection
