@extends('layouts.admin')

@section('content')

<h1>Edit Post</h1>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('author.posts.update', $post->id) }}">
    @csrf
    @method('PUT')

    <div>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{ $post->title }}" class="form-control">
    </div>

    <div>
        <label for="content">Content:</label>
        <textarea id="content" name="content" class="form-control">{{ $post->content }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Update Post</button>
</form>
@endsection