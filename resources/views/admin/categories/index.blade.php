@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-end m-3"><a href="{{ route('admin.posts.create') }}"
                class="btn btn-success">Create Post</a></div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Color</th>
                    <th scope="col">Logo</th>
                    <th scope="col"></th>

                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td> {{ $category->color }}</td>
                        <td>
                            <span class="badge badge-pill badge-{{ $category->color }}">{{ $category->name }}</span>
                        </td>
                        <td class="d-flex justify-content-end">
                            <a href="{{ route('admin.categories.show', $category->id) }}"
                                class="btn btn-primary mr-2">Dettagli</a>
                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                                class="btn btn-warning mr-2">Modifica</a>
                            <form method="POST" action="{{ route('admin.categories.destroy', $category->id) }}">
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
