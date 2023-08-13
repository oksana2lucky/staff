<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function noDepartment()
    {
        $noDepartmentEmployees = Employee::whereNull('department_id')->get();

        return view('employee.no_department', compact('noDepartmentEmployees'));
    }

}
