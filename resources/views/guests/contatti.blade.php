@extends('layouts.app');

@section('content')
    <div class="container">


        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Invio Email</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.contact.send') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">Nome:</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" placeholder="Inserisci nome" value="{{ old('name', ' ') }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Email:</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" placeholder="Inserisci email" value="{{ old('mail', ' ') }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="content">Contenuto post:</label>
                                <textarea class="form-control @error('message') is-invalid @enderror" id="message"
                                    name="message" rows="5">{{ old('message', ' ') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit">Invia</button>
                        </form>
                    </div>
                </div>
            </div>




        </div>
    </div>





@endsection
