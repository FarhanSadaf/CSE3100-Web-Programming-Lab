<h2>{{ $user->name }}, create a post!</h2>


<form action="{{ route('orm.post.create', $user->id) }}" method="POST">
    @csrf

    <div>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>
    </div>

    <div>
        <label for="content">Content:</label>
        <textarea name="content" id="content" rows="4" required></textarea>
    </div>

    <div>
        <label for="tags">Tags:</label>
        <select name="tags[]" id="tags" multiple>
            @foreach ($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit">Create Post</button>
</form>