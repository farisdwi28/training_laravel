<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'emp_name' => 'required',
        ]);

        $emp_code = $this->generateEmpCode();

        Employee::create([
            'emp_code' => $emp_code,
            'emp_name' => $request->emp_name,
        ]);

        return redirect()->route('employees.index');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'emp_name' => 'required',
        ]);
        $employee->emp_name = $request->emp_name;
        $employee->save();

        return redirect()->route('employees.index');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index');
    }

    private function generateEmpCode()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $emp_code = '';
        for ($i = 0; $i < 8; $i++) {
            $emp_code .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $emp_code;
    }
}
