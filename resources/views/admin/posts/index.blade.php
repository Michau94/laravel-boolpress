@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Created at:</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td> {{ $post->created_at }}</td>
                        <td><a href="{{ route('admin.posts.show', $post->id) }}">Dettagli</a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3"> No post Available!!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>


@endsection
