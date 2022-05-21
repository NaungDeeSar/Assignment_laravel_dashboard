@extends('backend.layouts.app')
@section('title','admin detail')
@section('user-active','mm-active')
@section('content')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fas fa-eye"></i>
            </div>
            <div>
                Employee  detail           
            </div>
        </div>
    </div>
</div> 

<a href="{{route('admin.user.index')}}" class="btn btn-primary my-2">
    <i class="fas fa-angle-double-left"></i>
    Black
</a>
<div class="content">
  
    <div class="card">
        
        <div class="card-body">
            <h4 class="py-2">[{{$user->name}}] Info</h4>
            <table id="Datatable" class="table table-striped table-bordered" style="width:100%">
             
                <tbody>
                  
                    <tr>
                        <td>Name</td>
                        <td>{{$user->name}}</td>
                       
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{$user->email}}</td>                      
                        
                    </tr>
                    <tr>                      
                        <td>Phone</td>
                        <td>{{$user->phone}}</td>                      
                    </tr>
                    <tr> 
                        <td>Address</td>                       
                        <td>{{$user->address}}</td>                       
                       
                    </tr>
                    <tr> 
                        <td>Position</td>                       
                        <td>{{$user->Position->name}}</td>                       
                       
                    </tr>
                    <tr> 
                        <td>States</td>                       
                        <td>{{$user->state}}</td>                       
                       
                    </tr>
                    <tr> 
                        <td>City</td>                       
                        <td>{{$user->city}}</td>                       
                       

                    </tr>
                    <tr> 
                        <td>Dob</td>                       
                        <td>{{$user->dob}}</td>                       
                       
                    </tr>
                    <tr> 
                        <td>Skills</td>                       
                        <td>{{$user->skill}}</td>                       
                       
                    </tr>
                    
                    <tr> 
                        <td>Photo</td>                       
                        <td>
                            <img src="{{asset($user->photo)}}" alt="image" width="250px" height="200px">
                            </td>                       
                       
                    </tr>
                    
                 
                </tbody>
            </table>


           
            @foreach ($employee->work_history as $data)
            <h4 class="py-2">[{{$user->name}}] Work History</h4>
            <table id="Datatable" class="table table-striped table-bordered" style="width:100%">
             
                <tbody>
                    
                  
                    <tr>
                        <td>Positon</td>
                        <td>{{$data->position_name}}</td>
                       
                    </tr>
                    <tr>
                        <td>company</td>
                        <td>{{$data->company_name}}</td>                      
                        
                    </tr>
                    <tr>                      
                        <td>Start Date</td>
                        <td>{{$data->start_date}}</td>                      
                    </tr>
                    <tr> 
                        <td>End Date</td>                       
                        <td>{{$data->end_date}}</td>                       
                       
                    </tr>
                    <tr> 
                        <td>Description</td>                       
                        <td>{{$data->note}}</td>                       
                       
                    </tr>
                    
                    
            
                </tbody>
            </table>
            @endforeach
         
                    
            @foreach ($employee->education as $data)
            <h4 class="py-2">[{{$user->name}}] Education</h4>
            <table id="Datatable" class="table table-striped table-bordered" style="width:100%">
             
                <tbody>
                    <tr>
                        <td>School</td>
                        <td>{{$data->school}}</td>
                       
                    </tr>
                    <tr>
                        <td>Degree</td>
                        <td>{{$data->degree}}</td>                      
                        
                    </tr>
                    <tr>                      
                        <td>Start Date</td>
                        <td>{{$data->edu_start_date}}</td>                      
                    </tr>
                    <tr> 
                        <td>End Date</td>                       
                        <td>{{$data->edu_end_date}}</td>                       
                       
                    </tr>
                    <tr> 
                        <td>Description</td>                       
                        <td>{{$data->edu_note}}</td>                       
                       
                    </tr>
                    
              
                </tbody>
            </table>
                  
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection