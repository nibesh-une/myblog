@extends('layouts.admin')

@section('content')
<form action="{{ $action }}" method="POST">
    @csrf
    @if(isset($method) && $method === 'PUT')
    @method('PUT')
    @endif

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="{{ $user->name ?? old('name') }}" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" value="{{ $user->email ?? old('email') }}" required>
    </div>

    <div class="form-group">
        <label for="role">Role</label>
        <select name="role" class="form-control" required>
            <option value="admin" {{ (isset($user) && $user->role === 'admin') ? 'selected' : '' }}>Admin</option>
            <option value="author" {{ (isset($user) && $user->role === 'author') ? 'selected' : '' }}>Author</option>
            <option value="user" {{ (isset($user) && $user->role === 'user') ? 'selected' : '' }}>User</option>
        </select>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" {{ isset($user) ? '' : 'required' }}>
        @if (isset($user))
        <small class="form-text text-muted">Leave blank to keep the current password.</small>
        @endif
    </div>

    <div class="form-group">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control" {{ isset($user) ? '' : 'required' }}>
    </div>

    <button type="submit" class="btn btn-primary">{{ $submitButtonText }}</button>
</form>
@endsection