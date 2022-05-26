<?php

namespace App\Http\Controllers\api;

use App\Models\city;
use App\Models\state;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Education;
use App\Models\WorkHistroy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Validator;

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
        return response()->json([
            'status' => 'ok',
            'totalResults' => count($users),
            'Users'=> UserResource::collection($users)
        ]);
    }

     //search (name,email,address)
     public function search($name){
            $result = Employee::where('name', 'LIKE', '%'.$name.'%')->get();       
            // $employee = Employee::where('name',$users->id)->first(); 
            // $employee->position =Position::where('id',$users->position_id)->first();    
            //return new UserResource($users);

            if(count($result)){
                 return response()->json([
                'search'=>UserResource::collection($result)
            ]);
               }
               else
               {
               return response()->json(['Result' => 'No Data not found'], 404);
             }
            
            // return response()->json([
            //     'search'=>UserResource::collection($users)
            // ]);
  }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'state'=>'required',
            'city'=>'required',
            'address'=>'required',
            'photo'=>'required|mimes:png',
            'dob'=>'required',
            'position_id'=>'required',
        ]);
     
        if($request->file()) {          
            $fileName = time().'_'.$request->photo->getClientOriginalName();          
            $filePath = $request->file('photo')->storeAs('images', $fileName, 'public');
            $path = '/storage/'.$filePath;
        }
           
      $user= Employee::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'state'=>$request->state,
                'city'=>$request->city,
                'address'=>$request->address,
                'photo'=>$path,
                'dob'=>$request->dob,
                'position_id'=>$request->position_id,
                'skill'=>$request->skill
            ]);
           // return new userResource($user);
    return new UserResource($user);

           
          
                // foreach ($request->workhistory as $data) {
                //     WorkHistroy::create([
                //         'emp_id'=>$id->id,
                //         'position_name'=>$data['position_name'],
                //         'company_name'=>$data['company_name'],
                //         'start_date'=>$data['start_date'],
                //         'end_date'=>$data['end_date'],
                //         'note'=>$data['note'],
        
                //     ]);   
                // }
        
                 //add education
            //      foreach ($request->education as $data) {
            //         education::create([
            //             'emp_id'=>$id->id,
            //             'school'=>$data['school'],
            //             'degree'=>$data['degree'],
            //             'edu_start_date'=>$data['edu_start_date'],
            //             'edu_end_date'=>$data['edu_end_date'],
            //             'edu_note'=>$data['edu_note'],
        
            //         ]); 
            //     }
               
            //  return response()->json($id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=Employee::findOrFail($id);
        $employee = Employee::where('id',$user->id)->first();
        $employee->work_history = WorkHistroy::where('emp_id',$user->id)->get();
        $employee->education = Education::where('emp_id',$user->id)->get();  
        $employee->position =Position::where('id',$user->position_id)->first();
        $employee->state=state::where('id',$user->state)->first();
        $employee->city=city::where('id',$user->city)->first();

        if($employee){
            return response()->json($employee);
          }
          else
          {
          return response()->json(['Result' => 'No Data not found'], 404);
        }
       // return new UserResource($employee);
        //return response()->json($employee);
       

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
        
        if($request->file()) {          
            $fileName = time().'_'.$request->photo->getClientOriginalName();          
            $filePath = $request->file('photo')->storeAs('images', $fileName, 'public');
            $path = '/storage/'.$filePath;
        }
   
     $id= Employee::findOrFail($id)->update([
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
        return ['result'=>"Employee updated success!"];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=Employee::findOrFail($id);
        $user->delete();
        return new userResource($user);
    }
}
