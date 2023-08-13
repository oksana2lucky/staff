@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <a href="/" class="btn btn-primary mb-3">Add an employee</a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('noDepartmentEmployees') }}" class="btn btn-primary mb-3">No department employees</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2>Departments</h2>
            <table class="table">
                <thead>
                <tr>
                    <th>Department Name</th>
                    <th>Employee Count</th>
                    <th>Average Salary</th>
                </tr>
                </thead>
                <tbody>
                @foreach($departments as $department)
                    <tr>
                        <td>{{ $department->name }}</td>
                        <td>{{ $department->employees_count }}</td>
                        <td>{{ number_format($department->employees_avg_salary, 2) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
