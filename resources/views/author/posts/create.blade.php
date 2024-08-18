@extends('layouts.admin')

@section('content')
<h1>Create Post</h1>

<!-- Display validation errors -->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<!-- Form for creating a post -->
<form action="{{ route('author.posts.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="content">Content</label>
        <textarea id="content" name="content" class="form-control" required>{{ old('content') }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit!</button>
</form>
@endsection
