@extends('layouts.admin')

@section('content')
<h1>Post Details</h1>
<div class="form-group">
    <label>Title</label>
    <p>{{ $post->title }}</p>
</div>
<div class="form-group">
    <label>Content</label>
    <p>{{ $post->content }}</p>
</div>
<div class="form-group">
    <label>Update by</label>
    <p>{{ $post->post?->name }}</p>
</div>
@endsection