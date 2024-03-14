<style>
    table {
        border-collapse: collapse;
    }

    th, td {
        border: 1px solid black;
    }
</style>

<h2>Posts from {{ $user->name }}</h2>

<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Tags</th>
            <th>Update / Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <td>{{ $post->title }}</td>
            <td>{{ $post->content }}</td>
            <td>
                @foreach ($post->tags as $tag)
                <span>{{ $tag->name }}</span>
                @endforeach
            </td>
            <td>
                <a href="{{ route('post.update', [$user->id, $post->id]) }}">Update</a>
                <a href="{{ route('post.delete', [$user->id, $post->id]) }}">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('post.create', $user->id) }}">Create a post</a>

