<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::query()->get();
        return view('employee.index', compact('employees'));
    }

    public function create()
    {
        return view('employee.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'telephone' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $employees = new Employee();
        $employees->name = $request->name;
        $employees->telephone = $request->telephone;
        $employees->email = $request->email;
        $employees->password = Hash::make($request->password);

        if ($request->department_id) {
            $employees->department_id = $request->department_id;
        }

        if ($employees->save()) {
            return redirect()->route('employees.index');
        }

        return redirect()->refresh();
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('employee.edit',compact('employee'));
    }

    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'telephone' => 'required',
            'email' => 'required',
        ]);

        $employees = Employee::find($id);
        $employees->name = $request->name;
        $employees->telephone = $request->telephone;
        $employees->email = $request->email;

        if($request->password){
            $employees->password = Hash::make($request->password);
        }

        if ($request->department_id) {
            $employees->department_id = $request->department_id;
        }

        if ($employees->save()) {
            return redirect()->route('employees.index');
        }

        return redirect()->refresh();
    }

    public function destroy($id)
    {
       $employee = Employee::where('id','=',$id)->delete();

       if($employee > 0){
            return 'success';
       }

       return "fail";

    }
}
