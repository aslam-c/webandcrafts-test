<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designation;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function addEmployee(){

        $designations=Designation::all();
        return view('add-employee',['designations'=>$designations]);

    }

    public function storeEmployeeDetails(Request $request){

        $validationRules=['name'=>['required', 'max:50','min:3'],
                          'email'=>['required','email','unique:employees','max:100'],
                          'designation_id'=>['required','exists:designations,id'],
                          'photo'=>['sometimes','image','max:50000']
        ];
        $inputs=$request->validate($validationRules);
        if($request->hasFile('photo')){
            $imagePath = $request->file('photo')->store('employee_photos');
            $imagePath=['photo'=>$imagePath];
            $inputs=array_merge($inputs,$imagePath);
        }
        $employee=Employee::create($inputs);
        return redirect('dashboard')->with(['message'=>'Employee added successfully']);
    }

    public function editEmployeeDetails($id){

        $designations=Designation::all();
        $employee=Employee::find($id);
        if($employee){
        return view('update-employee',['employee'=>$employee,'designations'=>$designations]);
        }
        return redirect('dashboard');
    }

    public function updateEmployeeDetails(Request $request,$id){

        $validationRules=['name'=>['required', 'max:50','min:3'],
        'email'=>['required','email','max:100'],
        'designation_id'=>['required','exists:designations,id'],
        'photo'=>['sometimes','image','max:50000']
        ];
    $inputs=$request->validate($validationRules);
    $employee=Employee::find($id);

    if($request->hasFile('photo')){
        $imagePath = $request->file('photo')->store('employee_photos');
        $imagePath=['photo'=>$imagePath];
        $inputs=array_merge($inputs,$imagePath);
    }

    $employee->update($inputs);
    return redirect('employees/list')->with(['message'=>'Employee details updated successfully']);
    }

    public function deleteEmployee($id){
        Employee::destroy($id);
        return redirect('employees/list')->with(['message'=>'Employee removed successfully']);
    }

    public function showEmployees(){
        return view('list-employees');
    }

    public function listEmployees(){ //api
        $employees=Employee::with('designation')->get();
        return response()->json(['data'=>$employees],200);
    }


}
