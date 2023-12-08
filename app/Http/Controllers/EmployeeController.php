<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        //    dd($employees);
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeStoreRequest $request)
    {

        $data = $request->validated();
        $data['password'] = Hash::make($request->password);
        $data['hobby'] = json_encode($request->hobby);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $img_name = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/employee', $img_name);
            $data['image'] = 'employee/' . $img_name;
        }
        $data['remember_me'] = $request->remember_me ? 1 : 0;
        Employee::create($data);
        return redirect()->route('employees.index')->with('message', 'Employee information created successfully.');
    }


    public function show(Employee $employee)

    {
        return view('employees.show', compact('employee'));
    }


    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeUpdateRequest $request, Employee $employee)
    {

        $data = $request->validated();
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }

        $data['hobby'] = json_encode($request->hobby);
        if ($request->hasFile('image')) {
            if ($employee->image) {
                Storage::delete('public/' . $employee->image);
            }

            $file = $request->file('image');
            $img_name = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/employee', $img_name);
            $data['image'] = 'employee/' . $img_name;
        }


        $data['remember_me'] = $request->remember_me ? 1 : 0;

        $employee->update($data);


        return redirect()->route('employees.index')->with('message', 'Employee information updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        if ($employee->image) {
            Storage::delete('public/' . $employee->image);
        }

        $employee->delete();

        return redirect()->route('employees.index')->with('danger', 'Employee deleted successfully.');
    }
}
