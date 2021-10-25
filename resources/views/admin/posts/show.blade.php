@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card p-3">

            <h1>{{ $post->title }}</h1>
            <div>
                @if ($post->tags)
                    @forelse ($post->tags as $tag)

                        <span class="badge badge-pill"
                            style="background-color : {{ $tag->color }}">{{ $tag->name }}</span>
                    @empty
                        -
                    @endforelse
                @endif
            </div>
            <h4> Category:@if ($post->category_id) {{ $post->category->name }} @else nessuna categoria @endif</h4>
            <p> {{ $post->content }}</p>



            <div>
                Written by:
                @if ($post->user_id)  {{ $post->user->name }} @else Anonimo @endif
            </div>
            <div class="d-flex justify-content-end">
                <a class="btn btn-secondary" href="{{ route('admin.posts.index') }}">Go Back</a>
            </div>


        </div>
    </div>


@endsection
