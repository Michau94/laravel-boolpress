@extends('layouts.app')

@section('content')

    <div class="container">

        <h1>Modify Roles for {{ $user->name }}</h1>

        <form action="{{ route('admin.users.update', compact('user')) }}" method="POST">
            @csrf
            @method('PATCH')

            @foreach ($roles as $role)
                <div class="form-check form-check-inline">
                    <input class="form-check-input m-2" type="checkbox" id="role-{{ $role->id }}"
                        value="{{ $role->id }}" name="roles[]" @if (in_array($role->id, $user_roles)) checked @endif>
                    <label class="form-check-label" for="role-{{ $role->id }}">{{ $role->name }}</label>

                </div>
            @endforeach
            <hr>
            <button type="submit" class="btn btn-success">Confirm</button>

        </form>


    </div>

@endsection
