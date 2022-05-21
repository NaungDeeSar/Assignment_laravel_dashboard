<?php

namespace App\Http\Controllers\backend;

use App\Models\city;
use App\Models\state;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Education;
use App\Models\Department;
use App\Models\WorkHistroy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    
    public function home(){
        $users=Employee::all();
        $deps=Department::all();  
        $pos=Position::all(); 
       
        return view('backend.home',compact('users','deps','pos'));
        
    }
    public function show($id){
        $user=Employee::findOrFail($id);
        $employee = Employee::where('id',$user->id)->first();
        $employee->work_history = WorkHistroy::where('emp_id',$user->id)->get();
        $employee->education = Education::where('emp_id',$user->id)->get();  
        return view('backend.admin_user.show',compact('user','employee'));

    }
    public function edit($id){
        $user=Employee::findOrFail($id);
        $pos=Position::all();
        $states=state::all();
        $citys=city::all();

        $employee = Employee::where('id',$user->id)->first();
        $employee->work_history = WorkHistroy::where('emp_id',$user->id)->get();
        $employee->education = Education::where('emp_id',$user->id)->get();      
        return view('Backend.admin_user.edit',compact('user','pos','employee','states','citys'));
    }
}
