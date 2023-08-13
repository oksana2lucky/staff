@extends('layouts.app')

@section('content')
    <h2>No Department Employees</h2>
    <table class="table">
        <thead>
        <tr>
            <th>Employee Name</th>
            <th>Employee Position</th>
            <th>Employee Salary</th>
            <th>Employment Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($noDepartmentEmployees as $employee)
            <tr>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->position->name }}</td>
                <td>{{ $employee->salary }}</td>
                <td>{{ $employee->formatted_employment_date }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
