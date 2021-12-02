<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;
use App\Models\company;


class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = employee::leftJoin('companies','companies.id','=','employees.company')
                        ->select('employees.*','companies.name')
                        ->latest('id')
                        ->paginate(10);

        return view('admin.EmployeeManagement.employeeList',compact('employee'));                

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $company_name = company::all();
        return view('admin.EmployeeManagement.employeeAdd',compact('company_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name'=>'required|max:50',
            'last_name'=>'required|max:50',
            'company_id'=>'required',
            'email'=>'required|email|unique:employees',
            'phone'=>'required|unique:employees|regex:/^([0-9\s\-\+\(\)]*)$/|min:6',
        ]);

        
        $data = new employee;
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->company = $request->company_id;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->save();
        $request->session()->flash('successMsg','Employee Added Successfully.');
        return redirect()->route('employee-management.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(employee $employee,$id)
    {
        $employee = employee::find($id);
        $company_name = company::all();
        return view('admin.EmployeeManagement.employeeEdit',compact('employee','company_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, employee $employee,$id)
    {
        $validatedData = $request->validate([
            'first_name'=>'required|max:50',
            'last_name'=>'required|max:50',
            'company_id'=>'required'
        ]);

        $data = employee::find($id);    
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->company = $request->company_id;
        $data->update();
        $request->session()->flash('successMsg','Employee Updated Successfully.');
        return redirect()->route('employee-management.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(employee $employee,$id)
    {
        $data = employee::find($id);
        $data->delete();
        return redirect()->route('employee-management.index')->with('successMsg',"Employee Record Deleted Successfully.");
    }
}
