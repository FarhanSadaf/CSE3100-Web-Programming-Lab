<h2>{{ $user->name }}, update a post!</h2>


<form action="{{ route('post.update', [$user->id, $post->id]) }}" method="POST">
    @csrf

    <div>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{ $post->title }}" required>
    </div>

    <div>
        <label for="content">Content:</label>
        <textarea name="content" id="content" rows="4" required>{{ $post->content }}</textarea>
    </div>

    <div>
        <label for="tags">Tags:</label>
        <select name="tags[]" id="tags" multiple>
            @foreach ($tags as $tag)
                <option value="{{ $tag->id }}" {{ in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $tag->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit">Update Post</button>
</form>