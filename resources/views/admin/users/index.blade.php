@extends('layouts.app')

@section('content')

    <div class="container">
        @include('includes.admin..alert_msg')
        <div class="d-flex justify-content-end m-3"><a href="{{ route('admin.posts.create') }}"
                class="btn btn-success">Create Post</a></div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col"></th>

                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td> {{ $user->email }}</td>
                        <td>
                            @forelse ($user->roles as $role) <span class="badge badge-pill" style="background-color: {{ $role->color }}">{{ $role->name }}</span> @empty - @endforelse
                        </td>
                        <td class="d-flex justify-content-end">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning mr-2">Modifica
                                Ruolo</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3"> No users Available!!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>





@endsection
