<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $departments = DB::table('departments')
            ->select('departments.*')
            ->selectRaw('COUNT(employees.id) as employees_count')
            ->selectRaw('AVG(employees.salary) as employees_avg_salary')
            ->leftJoin('employees', 'departments.id', '=', 'employees.department_id')
            ->groupBy('departments.id')
            ->get();

        return view('home', compact('departments'));
    }
}
