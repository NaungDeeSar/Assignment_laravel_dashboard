<?php

namespace App\Http\Controllers\backend;

use App\Models\city;
use App\Models\state;
use App\Models\Employee;
use App\Models\Position;
use App\Models\education;
use App\Models\Department;

use App\Models\workhistory;
use App\Models\WorkHistroy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users=Employee::all();
        $deps=Department::all();         
        return view('backend.admin_user.index',compact('users','deps'));
        
    }
   
     //search (name,email,address)
    public function search(Request $request){

        if($request->ajax()) {

            $output = '';

            $users = Employee::where('name', 'LIKE', '%'.$request->search.'%')
                            ->orWhere('email', 'LIKE', '%'.$request->search.'%')
                            ->orWhere('address', 'LIKE', '%'.$request->search.'%')
                            ->get();

            if($users) {

                foreach($users as $user) {

                    $output .=
                  '
                  <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                  <div class="our-team shadow">
                    <div class="picture">
                      <img class="img-fluid" src="'.$user->photo.'">
                    </div>
                    <div class="team-content">
                      <h5 class="name">'.$user->name.'</h5>                  
                      <h4 class="title">'.$user->position->department->name.'</h4>
                      <h4 class="title">'.$user->position->name.'</h4>
                    </div>
                    <ul class="social">
                      <li>
                      <a href="'.route('admin.user.show',$user->id).'" class="" aria-hidden="true">
                          <i class="fas fa-eye"></i>
                      </a>
                  </li>
                  <li>
                      <a href="'.route('admin.user.edit',$user->id).'" class="" aria-hidden="true">
                          <i class="fas fa-edit"></i>
                      </a>
                  </li>                  
                  </ul>
                  </div>
                </div>
                  ';

                }
            }
            return response()->json($output);

        }
    return view('backend.admin_user.index');

  }

  
    public function create()
    {
        $deps=Department::all();
        $states=state::all();
        return view('backend.admin_user.create',compact('deps','states'));
    }

    
    public function store(Request $request)
    {

        //Save new employee  with profile photo

        if($request->file()) {          
            $fileName = time().'_'.$request->photo->getClientOriginalName();          
            $filePath = $request->file('photo')->storeAs('images', $fileName, 'public');
            $path = '/storage/'.$filePath;
        }

        //add user
        $employee =  Employee::create([
            'name' =>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'state'=>$request->state,
            'city'=>$request->city,
            'dob' =>$request->dob,
            'skill'=>$request->skill,
            'position_id'=>$request->position_id,
            'photo' =>$path,

        ]);

        //add work history
        foreach ($request->workhistory as $data) {
            WorkHistroy::create([
                'emp_id'=>$employee->id,
                'position_name'=>$data['position_name'],
                'company_name'=>$data['company_name'],
                'start_date'=>$data['start_date'],
                'end_date'=>$data['end_date'],
                'note'=>$data['note'],

            ]);   
        }

         //add education
         foreach ($request->education as $data) {
            education::create([
                'emp_id'=>$employee->id,
                'school'=>$data['school'],
                'degree'=>$data['degree'],
                'edu_start_date'=>$data['edu_start_date'],
                'edu_end_date'=>$data['edu_end_date'],
                'edu_note'=>$data['edu_note'],

            ]);   
        }
        return redirect()->route('admin.user.index')->with('create','create successfully');
    }

   //show each empoyee
    public function show($id)
    {
        $user=Employee::findOrFail($id);
        $employee = Employee::where('id',$user->id)->first();
        $employee->work_history = WorkHistroy::where('emp_id',$user->id)->get();
        $employee->education = education::where('emp_id',$user->id)->get();  
        return view('backend.admin_user.show',compact('user','employee'));
    }

    
    public function edit($id)
    {
        $user=Employee::findOrFail($id);
        $pos=Position::all();
        $states=state::all();
        $citys=city::all();
        $employee = Employee::where('id',$user->id)->first();
        $employee->work_history = WorkHistroy::where('emp_id',$user->id)->get();
        $employee->education = Education::where('emp_id',$user->id)->get();      
        return view('Backend.admin_user.edit',compact('user','pos','employee','states','citys'));
    }

    //update for employee

    public function update(Request $request, $id)
    {

        if($request->file()) {          
            $fileName = time().'_'.$request->photo->getClientOriginalName();          
            $filePath = $request->file('photo')->storeAs('images', $fileName, 'public');
            $path = '/storage/'.$filePath;
        }
   
      Employee::findOrFail($id)->update([
            'name' =>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'state'=>$request->state,
            'city'=>$request->city,
            'dob' =>$request->dob,
            'skill'=>$request->skill,
            'position_id'=>$request->position_id,
            'photo' =>$path,

        ]);

      


        if(isset($request->work_id))
        {
            for($i=0;$i<count($request->work_id);$i++)
            {
                if(isset($request->work_id[$i])){
                    WorkHistroy::where('id',$request->work_id[$i])->update([                       
                        'position_name'=>$request->position_name[$i],
                        'company_name'=>$request->company_name[$i],
                        'start_date'=>$request->start_date[$i],
                        'end_date'=>$request->end_date[$i],
                        'note'=>$request->note[$i],
                    ]); 

                }else{
                    WorkHistroy::create([
                        'emp_id'=>$id->id,
                        'position_name'=>$request->position_name[$i],
                        'company_name'=>$request->company_name[$i],
                        'start_date'=>$request->start_date[$i],
                        'end_date'=>$request->end_date[$i],
                        'note'=>$request->note[$i], 

                    ]);

                }  
            } 
        }

        if(isset($request->edu_id))
        {
            for($i=0;$i<count($request->edu_id);$i++)
            {
                if(isset($request->edu_id[$i]))
                {
                    education::where('id',$request->edu_id[$i])->update([
                       
                        'school'=>$request->school[$i],
                        'degree'=>$request->degree[$i],
                        'edu_start_date'=>$request->edu_start_date[$i],
                        'edu_end_date'=>$request->edu_end_date[$i],
                        'edu_note'=>$request->edu_note[$i],
                    ]);
                }else{
                    education::create([
                        'emp_id'=>$id->id,                        
                        'school'=>$request->school[$i],
                        'degree'=>$request->degree[$i],
                        'edu_start_date'=>$request->edu_start_date[$i],
                        'edu_end_date'=>$request->edu_end_date[$i],
                        'edu_note'=>$request->edu_note[$i],
                    ]);
                }
            }
        }


        return redirect()->route('admin.user.index')->with('create','Update successfully');
    }

  //delete
  
    public function destroy($id)
    {
        $dep=Employee::findOrFail($id)->delete();
        return redirect()->route('admin.user.index')->with('create','Delete successfully');
    }
}
