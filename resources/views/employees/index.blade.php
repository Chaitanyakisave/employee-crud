@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-2">
    <h2>Employee List</h2>
    <a class="btn btn-primary" href="{{ route('employees.create') }}">Add Employee</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Position</th>
        <th>Actions</th>
    </tr>
    @foreach($employees as $employee)
    <tr>
        <td>{{ $employee->id }}</td>
        <td>{{ $employee->name }}</td>
        <td>{{ $employee->email }}</td>
        <td>{{ $employee->position }}</td>
        <td>
            <a class="btn btn-success btn-sm" href="{{ route('employees.edit', $employee->id) }}">Edit</a>
            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
   
@endsection
