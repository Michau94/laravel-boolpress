@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card p-3">

            <h1>{{ $category->name }}</h1>
            <p> Logo sample: <span class="badge badge-pill badge-{{ $category->color }}">{{ $category->name }}</span></p>


            <div class="d-flex justify-content-end">
                <a class="btn btn-secondary" href="{{ route('admin.categories.index') }}">Go Back</a>
            </div>


        </div>
    </div>


@endsection
