<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index() {
        $employees = Employee::all();
      //  dd($employees);
      //$employees = Employee::paginate(2);
         return view('employees.index', compact('employees'));
       // return view ('employees.index',['employees'=>$employees]);
    }

    public function create() {
        return view('employees.create');
    }

    public function store(Request $request) {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:employees,email',
        //     'position' => 'required'
        // ]);

         $request->validate([
        'name' => 'required|regex:/^[A-Za-z\s]+$/',
       // 'email' => 'required|email|unique:employees,email',
       'email' => [
    'required',
    'email',
    'unique:employees,email',
    'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'
],
        'position' => 'required'
    ], [
        'name.regex' => 'The name must contain only letters and spaces.',
    ]);

        Employee::create($request->all());
        return redirect()->route('employees.index')->with('success', 'Employee created successfully!');
    }

    public function edit(Employee $employee) {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee) {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:employees,email,' . $employee->id,
        //     'position' => 'required'
        // ]);

         $request->validate([
        'name' => 'required|regex:/^[A-Za-z\s]+$/',
        //'email' => 'required|email|unique:employees,email',
        'email' => [
    'required',
    'email',
    'unique:employees,email',
    'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'
],
        'position' => 'required'
    ], [
        'name.regex' => 'The name must contain only letters and spaces.',
    ]);
        $employee->update($request->all());
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully!');
    }

    public function destroy(Employee $employee) {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully!');
    }
}

