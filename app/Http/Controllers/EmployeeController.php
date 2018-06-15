<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    //Show The Toatl Employee Detail ,10 per page
    public function index()
    {
        $employee=Employee::Paginate(10);
        return view('employee')->with('employees', $employee);
    }


    /**
     * Store a newly created Employee in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  

     $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|unique:employees',
        'mobile_number' => 'required|numeric|unique:employees|digits:11',
        'designation' => 'required|max:255',
    ]);
// Bangladeshi phone number Validator
     $valid_number=preg_match("/^(?:\+?88|0088)?01[15-9]\d{8}$/", $request->mobile_number);
     if(!$valid_number){
        return back()->with('message', 'Phone Number Not Valid');

    }
    else if($validatedData ){
        $employee = new Employee;
        $employee->name=$request->name;
        $employee->email=$request->email;
        $employee->mobile_number=$request->mobile_number;
        $employee->designation=$request->designation;
        $employee->save();
        return back()->with('message', 'Employee Info Save Successfully');
    }
    else {
       return back()->with('message', 'Employee Info Save UnSuccessfully');
   }



}



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    { 
        $employee = Employee::findOrFail( $request->employee_id);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:employees,email,'.$employee->id,
            'mobile_number' => 'required|numeric|digits:11|unique:employees,mobile_number,'.$employee->id,
            'designation' => 'required|max:255',
        ]);


        if($validatedData){

            $employee->name=$request->name;
            $employee->email=$request->email;
            $employee->mobile_number=$request->mobile_number;
            $employee->designation=$request->designation;
            $employee->save();
            return back()->with('message', 'Employee Info Update Successfully');
        }
        else {
           return back()->with('message', 'Employee Info Update UnSuccessfully');
       }
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return back()->with('message', 'Employee Info Delete Successfully');
    }
}
