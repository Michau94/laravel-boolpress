@if ($post->exists)
    <form method="POST" action="{{ route('admin.posts.update', compact('post')) }}">
        @method('PATCH')
    @else
        <form method="POST" action="{{ route('admin.posts.store') }}">
@endif
@csrf
<div class="form-group">
    <label for="title">Titolo:</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci qui il tuo titolo"
        value="{{ $post->title }}">
</div>

<div class="form-group">
    <label for="content">Contenuto post:</label>
    <textarea class="form-control" id="content" name="content" rows="5">{{ $post->content }}"</textarea>
</div>
<div class="form-group">
    <label for="image">Image Url</label>
    <input type="text" class="form-control" id="image" name="image" value="{{ $post->image }}">
</div>
<div class="d-flex justify-content-end">

    <button type="submit" class="btn btn-success">Confirm</button>
</div>
</form>
