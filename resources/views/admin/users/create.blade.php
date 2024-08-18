@extends('layouts.admin')

@section('content')
<h1>Create User</h1>
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
'action' => route('admin.users.store'),
'submitButtonText' => 'Create User'
])
@endsection