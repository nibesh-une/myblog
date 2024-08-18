@extends('layouts.admin')

@section('content')
<h1>Users</h1>
<a href="{{ route('admin.users.create') }}" class="btn btn-primary">Create User</a>

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
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>
                <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-info">View</a>
                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">Edit</a>

                @if(auth()->user()->id !== $user->id)
                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection