@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card p-3">

            <h1>{{ $post->title }}</h1>
            <h2>@if ($post->category_id) {{ $post->category->name }} @else nessuna categoria @endif</h2>
            <p> {{ $post->content }}</p>


            <div class="d-flex justify-content-end">
                <a class="btn btn-secondary" href="{{ route('admin.posts.index') }}">Go Back</a>
            </div>


        </div>
    </div>


@endsection
