@extends('layouts.admin')

@section('content')
<h1>posts</h1>
<a href="{{  route('author.posts.create')  }}" class="btn
    btn-primary">Create post</a>

<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{ $post->title }}</td>
            <td>{{ $post->content }}</td>
            <td>{{ $post->user ? $post->user->name : '' }}</td>
            <td>
                <a href="{{ route('author.posts.show', $post->id) }}" class="btn btn-info">View</a>
                <a href="{{ route('author.posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>

                <form action="{{ route('author.posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection