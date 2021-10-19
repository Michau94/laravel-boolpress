@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Crea un Nuovo Post</h1>

        <form method="POST" action="{{ route('admin.posts.store') }}">
            @csrf
            <div class="form-group">
                <label for="title">Titolo:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci qui il tuo titolo">
            </div>

            <div class="form-group">
                <label for="content">Contenuto post:</label>
                <textarea class="form-control" id="content" name="content" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image Url</label>
                <input type="text" class="form-control" id="image" name="image">
            </div>
            <div class="d-flex justify-content-end">

                <button type="submit" class="btn btn-success">Crea</button>
            </div>
        </form>




    </div>

@endsection
