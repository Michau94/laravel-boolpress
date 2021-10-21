@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-end m-3"><a href="{{ route('admin.posts.create') }}"
                class="btn btn-success">Create Post</a></div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Created at:</th>
                    <th scope="col"> Categoria</th>
                    <th scope="col"></th>

                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td> {{ $post->getCreationTime('created_at') }}</td>
                        <td>
                            @if ($post->category) <span class="badge badge-pill badge-primary">{{ $post->category->name }}</span>@else nessuna categoria @endif
                        </td>
                        <td class="d-flex justify-content-end">
                            <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary mr-2">Dettagli</a>
                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning mr-2">Modifica</a>
                            <form method="POST" action="{{ route('admin.posts.destroy', $post->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger mr-2" type="submit">Elimina</button>
                            </form>

                        </td>


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
