@extends('layouts.app')

@section('content')
<h2>Edit Employee</h2>
<a class="btn btn-secondary mb-3" href="{{ route('employees.index') }}">Back</a>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('employees.update', $employee->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $employee->name }}">
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ $employee->email }}">
    </div>
    <div class="mb-3">
        <label>Position</label>
        <input type="text" name="position" class="form-control" value="{{ $employee->position }}">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
