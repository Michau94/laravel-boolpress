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
    @error('title')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="form-group">
    <label for="content">Contenuto post:</label>
    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content"
        rows="5">{{ old('content', $post->content) }}</textarea>
    @error('content')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <label for="image">Image Url</label>
    <input type="text" class="form-control" id="image" name="image" value="{{ old('image', $post->image) }}">
</div>
<label for="category_id">Category:</label>
<select id="category_id" class="form-control form-group" name="category_id">
    <option value=" ">Nessuna Categoria</option>
    @foreach ($categories as $category)
        <option @if (old('category_id', $post->category_id) == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
</select>
<fieldset>
    <h5>Tags</h5>
    @foreach ($tags as $tag)
        <div class="form-check form-check-inline form-group">
            <input class="form-check-input" type="checkbox" id="tag-{{ $tag->id }}" value="{{ $tag->id }}"
                name="tags[]" @if (in_array($tag->id, old('tags', $tagIds ?? []))) checked @endif>
            <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
        </div>
    @endforeach
</fieldset>


<div class="d-flex justify-content-end">

    <button type="submit" class="btn btn-success">Confirm</button>
</div>
</form>
