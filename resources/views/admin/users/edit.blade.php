@extends('layouts.admin')

@section('content')
<h1>Edit User</h1>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@include('admin.users.form', [
'action' => route('admin.users.update', $user->id),
'method' => 'PUT',
'user' => $user,
'submitButtonText' => 'Update User'
])
@endsection