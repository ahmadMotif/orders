<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use DB;
use Session;
use Hash;
use Input;
use App\Http\Requests\StoreUsersValidation;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = User::employees()->orderBy('id', 'desc')->paginate(10);
        return view('manage.employees.index')->withEmployees($employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employeesJobs = Role::employeesJobs()->get();
        return view('manage.employees.create')->withEmployeesJobs($employeesJobs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersValidation $request)
    {
        $employee = new User();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->password = Hash::make($request->password);
        $employee->save();
        $employee->syncRoles($request->input('jobs',[]));

        return redirect()->route('employees.show', $employee->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = User::employees()->where('id', $id)->first();
        return view('manage.employees.show')->withEmployee($employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employeesJobs = Role::employeesJobs()->get();
        $employee = User::employees()->where('id', $id)->with('roles')->first();
        return view('manage.employees.edit')
            ->withEmployee($employee)
            ->withEmployeesJobs($employeesJobs);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validateWith([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$id
        ]);
        $employee = User::findOrFail($id);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->save();
        $employee->syncRoles($request->input('jobs',[]));

        return redirect()->route('employees.show', $employee->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = User::employees()->where('id', $id)->first();
        $employee->delete();
        return back();
    }
}
