@if ($post->exists)
    <form method="POST" action="{{ route('admin.posts.update', compact('post')) }}">
        @method('PATCH')
    @else
        <form method="POST" action="{{ route('admin.posts.store') }}">
@endif
@csrf
<div class="form-group">
    <label for="title">Titolo:</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
        placeholder="Inserisci qui il tuo titolo" value="{{ old('title', $post->title) }}">
    <div class="@error('title') invalid-feedback @enderror">
        @error('title')
            {{ $message }}

        @enderror</div>
</div>

<div class="form-group">
    <label for="content">Contenuto post:</label>
    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content"
        rows="5">{{ old('content', $post->content) }}</textarea>
    <div class="@error('content') invalid-feedback @enderror">
        @error('content')
            {{ $message }}

        @enderror</div>
</div>
<div class="form-group">
    <label for="image">Image Url</label>
    <input type="text" class="form-control" id="image" name="image" value="{{ old('image', $post->image) }}">
</div>
<div class="d-flex justify-content-end">

    <button type="submit" class="btn btn-success">Confirm</button>
</div>
</form>
