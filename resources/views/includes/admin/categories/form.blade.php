@if ($category->exists)
    <form method="POST" action="{{ route('admin.categories.update', compact('category')) }}">
        @method('PATCH')
    @else
        <form method="POST" action="{{ route('admin.categories.store') }}">
@endif
@csrf
<div class="form-group">
    <label for="title">Name:</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
        placeholder="Inserisci qui il tuo titolo" value="{{ old('name', $category->name) }}">
    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<label for="color">Color:</label>
<select id="color" class="form-control form-group" name="color">
    <option>Nessun Colore</option>

    {{-- Verificare questa parte --}}
    <option @if (old('color', $category->color) && old('color', $category->color) == $category->color) selected @endif value="primary">Blue</option>
    <option @if (old('color', $category->color) && old('color', $category->color) == $category->color) selected @endif value="secondary">Grey</option>
    <option @if (old('color', $category->color) && old('color', $category->color) == $category->color) selected @endif value="warning">Orange</option>
    <option @if (old('color', $category->color) && old('color', $category->color) == $category->color) selected @endif value="danger">Red</option>
    <option @if (old('color', $category->color) && old('color', $category->color) == $category->color) selected @endif value="success">Green</option>

</select>

<div class="d-flex justify-content-end">

    <button type="submit" class="btn btn-success">Confirm</button>
</div>
</form>
