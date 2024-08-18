@extends('layouts.admin')

@section('content')
<h1>User Details</h1>
<div class="form-group">
    <label>Name</label>
    <p>{{ $user->name }}</p>
</div>
<div class="form-group">
    <label>Email</label>
    <p>{{ $user->email }}</p>
</div>
<div class="form-group">
    <label>Role</label>
    <p>{{ $user->role }}</p>
</div>
@endsection