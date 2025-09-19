@extends('layouts.app')

@section('content')
<h2>Add Employee</h2>
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

<form action="{{ route('employees.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control">
    </div>
    <div class="mb-3">
        <label>Position</label>
        <input type="text" name="position" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
