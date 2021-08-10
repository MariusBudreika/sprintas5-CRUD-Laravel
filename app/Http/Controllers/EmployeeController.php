<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller {
    public function index(){
        return view('employees.index', ['employees' => Employee::orderBy('name')->get()]);
    }
    // ATTENTION :: we need projects to be able to assign them
    public function create(){
        $projects = \App\Models\Project::orderBy('project')->get();
        return view('employees.create', ['projects' => $projects]);
    }
    public function store(Request $request){
        $employee = new Employee();
        $employee->fill($request->all());
        $employee->save();
        return redirect()->route('employee.index');
    }
    public function show(Employee $employee){
        //
    }
    // ATTENTION :: we need projects to be able to assign them
    public function edit(Employee $employee){
        $projects = \App\Models\Project::orderBy('project')->get();
        return view('employees.edit', ['employee' => $employee, 'projects' => $projects]);
    }
    public function update(Request $request, Employee $employee){
        $employee->fill($request->all());
        $employee->save();
        return redirect()->route('employee.index');
    }
    public function destroy(Employee $employee){
        $employee->delete();
        return redirect()->route('employee.index');
    }
}

