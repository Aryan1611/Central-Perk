<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $employees = Employee::all();
        return view('employees',compact('employees'));
    }

    public function create()
    {
        return ("Create Employees Page");
    }


    public function store(Request $request)
    {
        if ($request['actionType'] == 'Create'){
            $request->validate([
                'first_name'=>'required|max:5',
                'middle_name'=>'required',
                'last_name'=>'required',
                'designation' => 'required',
                'doj' =>'required|date_format:Y-m-d'
            ]);
            
            $employee = new Employee;
    
            $employee->fill($request->except('actionType'));
            $employee->save();
            $request->session()->flash('message','Employee Created Successfully');
            return response()->json(['success'=>true,'result'=>'Employee Created Successfully','employee'=>$employee]);
        }
        else{
            return $this->update($request,Employee::findOrFail($request['id']));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'first_name'=>'required|max:5',
            'middle_name'=>'required',
            'last_name'=>'required',
            'designation' => 'required',
            'doj' =>'required|date_format:Y-m-d'
        ]);
        
        $employee->fill($request->except('actionType'));
        $employee->save();
        $request->session()->flash('message','Employee Updated Successfully');
        return response()->json(['success'=>true,'result'=>'Emplyee Updated Successfully','employee'=>$employee]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Employee $employee)
    {
        $employee->delete();
        
        $request->session()->flash('message','Employee Deleted Successfully');
        return redirect()->intended('/employees');
        
    }
}
