@extends('backend.layouts.app')
@section('title','Edit Employee')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fas fa-edit"></i>
            </div>
            <div>Edit Employee              
            </div>
        </div>
    </div>
</div> 
<div class="content">
    <div class="container card">        
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
          <form action="{{route('admin.user.update',$user->id)}}" method="post" id="update" enctype="multipart/form-data">
            @csrf
            @method('PUT')
              <div class="form-group">
                  <label for="">Name</label>
                  <input type="text" class="form-control" name="name" value="{{$user->name}}">
              </div>
              
              <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" value="{{$user->email}}">
            </div>
           
            <div class="form-group">
                <label for="">Phone</label>
                <input type="number" class="form-control" name="phone" value="{{$user->phone}}">
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <textarea  cols="2" rows="3" class="form-control" name="address">
                    {{$user->address}}
                </textarea>              
            </div>
            <div class="form-group">
                <label class="control-label">Position</label>
                <select name="position_id" class="form-control">
                    <option value="">selected Option</option>
                    @foreach ($pos as $ps)
                    <option  value="{{$ps->id}}" {{ $ps->id == $user->position_id ? 'selected':'' }}>{{$ps->name}}</option>
              
                    @endforeach

                </select>
            </div>
           
        </div>
        
        <div class="col-md-6">           
          
            <div class="form-group">
                <label class="control-label">State</label>
                <select name="state" class="form-control"  id="state">
                    <option value="">selected State</option>
                    @foreach ($states as $state)
                    <option  value="{{$state->id}}" {{ $state->id == $user->state ? 'selected':'' }}>{{$state->name}}</option>
              
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label for="">City</label>
                <select name="city" class="form-control" id="city">
                    <option value="">selected City</option>
                    @foreach ($citys as $city)
                    <option  value="{{$city->id}}" {{ $city->id == $user->city ? 'selected':'' }}>{{$city->name}}</option>
              
                    @endforeach
                </select>
            </div>
               <div class="form-group">
                   <label for="">DOB</label>
                   <input type="date" value="{{$user->dob}}" name="dob" class="form-control" id="dob" >
               </div>
               <div class="form-group">
                <label for="">Technical Skill</label>
                <input type="text" value="{{$user->skill}}" name="skill" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Photo</label><br>                
                <input type="file"  name="photo">
                <img src="{{asset($user->photo)}}" alt="image" class="img-fluid" width="90px">
              
            </div> 
                     
        </div>
       
         <!-- start cloned work history -->
         <section class="container workhistory">
            <div class="row">
                <div class="col-12">
                    <h5 class="text-info  float-left">Work History</h5>
                    <span class="btn btn-success float-right" id="newWorkHistory">
                      <i class="fas fa-plus"></i>    
                    </span>
                </div>
            </div>
            @foreach ($employee->work_history as $data)           
             <div class="row">
                <input type="hidden" value="{{$data->id}}" name="work_id[]" class="form-control">
             </div>
            <div class="row  mt-3">
                <div class="col-2">
                    <label for="" class="form-label">Position</label>
                </div>
                <div class="col-3">
                    <input type="text" value="{{$data->position_name}}" name="position_name[]" class="form-control">
                </div>
                <div class="col-2">
                    <label for="" class="form-label">Company Name</label>
                </div>
                <div class="col-3">
                    <input type="text" value="{{$data->company_name}}" name="company_name[]" class="form-control">
                </div>
            </div>
         

            <div class="row align-items-center mt-3">
                <div class="col-2">
                    <label for="" class="form-label">Start Date</label>
                </div>
                <div class="col-3">
                    <input type="date" value="{{$data->start_date}}" name="start_date[]" class="form-control">
                </div>
                <div class="col-2">
                    <label for="" class="form-label">End Date</label>
                </div>
                <div class="col-3">
                    <input type="date" value="{{$data->end_date}}" name="end_date[]" class="form-control">
                </div>
            </div>
            <div class="row  mt-3">
                <div class="col-2">
                    <label for="">Description</label>
                </div>
                <div class="col-8">
                    <textarea name="note[]" id="" cols="135" rows="2" class="form-control">
                        {{$data->note}}
                    </textarea>
                </div>
            </div>
          
          
            <hr>
            @endforeach
        </section>
          <!-- end cloned work history -->

          <!-- start cloned education -->
          <section class="education">           
            @foreach ($employee->education as $data)
            <div class="row">
                <div class="col-12">
                    <h5 class="text-info mt-3 d-inline float-left">Education</h5>
                    <span class="btn btn-success float-right text-light" id="addEducation">
                         <i class="fas fa-plus"></i>
                    </span>
                </div>
            </div>
            <div class="row">
                <input type="hidden" value="{{$data->id}}" name="edu_id[]" class="form-control">
             </div>
            <div class="row  mt-3">
                <div class="col-2">
                    <label for=""class="form-label">School</label>
                </div>
                <div class="col-3">
                    <input type="text" value="{{$data->school}}" name="school[]" class="form-control">
                </div>
                <div class="col-2">
                    <label for="" class="form-label">Degree</label>
                </div>
                <div class="col-3">
                    <input type="text" value="{{$data->degree}}" name="degree[]" class="form-control">
                </div>
            </div>
            <div class="row  mt-3">
                <div class="col-2">
                    <label for="" class="form-label">Start Date</label>
                </div>
                <div class="col-3">
                    <input type="date" value="{{$data->edu_start_date}}" name="edu_start_date[]" class="form-control">
                </div>
                <div class="col-2">
                    <label for="" class="form-label">End Date</label>
                </div>
                <div class="col-3">
                    <input type="date" value="{{$data->edu_end_date}}" name="edu_end_date[]" class="form-control">
                </div>
            </div>
            <div class="row  mt-3">
                <div class="col-2">
                    <label for="">Description</label>
                </div>
                <div class="col-8">
                    <textarea name="edu_note[]" cols="135" rows="2" class="form-control">
                        {{$data->edu_note}}
                    </textarea>
                </div>
            </div>
           
        <hr>
        @endforeach
         </section>
           
          <!-- end cloned education -->

            <div class="d-flex">
                <button class="btn btn-danger back-btn">Cancel</button>
                <button type="submit" class="btn btn-primary ml-2">
                   <i class="fas fa-edit"></i> edit</button>
            </div>
          </form>
        </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')

{!! JsValidator::formRequest('App\Http\Requests\employee','#update') !!} 
<script>
$(document).ready(function() {
          $('#state').on('change', function() {
               let state_id = $(this).val();
               if(state_id) {
                   $.ajax({
                       url: '/getState/'+state_id,
                       type: "GET",
                       data : {"_token":"{{ csrf_token() }}"},
                       dataType: "json",
                       success:function(data)                       
                       {
                        
                         if(data){
                            $('#city').empty();
                            $('#city').append('<option hidden>Choose City</option>');
                            $.each(data, function(key , city){
                                $('#city').append('<option value="'+ city.id +'">' + city.name + '</option>');
                            });
                        }else{
                            $('#city').empty();
                        }
                     }
                   });
               }else{
                 $('#city').empty();
               }
            });
});

let clone= 0;

$("#newWorkHistory").click(function(){
  clone += 1;
  $(".workhistory").append(`<div id="clone_${clone}">
                <div class="row" >
                    <div class="col-12">
                        <h5 class="mt-3 float-left text-info">Another Work History</h5>
                        <button type="button" class="btn btn-danger float-right" onClick="minusLess(${clone})">
                            <i class="fas fa-minus"></i>
                            </button>                     
                    </div>
                </div>
                <input type="hidden" name="work_id[]" class="form-control" >
                <div class="row  mt-3">
                    <div class="col-2">
                        <label for="" class="form-label">Position</label>
                    </div>
                    <div class="col-3">
                        <input type="text" name="position_name[]" class="form-control">
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">Company Name</label>
                    </div>
                    <div class="col-3">
                        <input type="text" name="company_name[]" class="form-control">
                    </div>
                </div>
                <div class="row align-items-center mt-3">
                    <div class="col-2">
                        <label for="" class="form-label">Start Date</label>
                    </div>
                    <div class="col-3">
                        <input type="date" name="start_date[]" class="form-control">
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">End Date</label>
                    </div>
                    <div class="col-3">
                        <input type="date" name="end_date[]" class="form-control">
                    </div>
                </div>
                <div class="row  mt-3">
                    <div class="col-2">
                        <label for="">Description</label>
                    </div>
                    <div class="col-8">
                        <textarea name="note[]" id="" cols="135" rows="2" class="form-control"></textarea>
                    </div>
                </div>
                <hr>
            </div>
        `);
  });

  function minusLess(id){
      $(`#clone_${id}`).remove();
  };


  $("#addEducation").click(function(){
      clone +=1;
      $(".education").append(`
              <div id="clone_${clone}" class="education1">
                <input type="hidden" name="edu_id[]" class="form-control" >
                  <div class="row">
                  <div class="col-12">
                      <h5 class="text-info mt-3  float-left">Another Education</h5>
                      <button type="button" class="btn btn-danger float-right" onClick="minusLess(${clone})">
                          <i class="fas fa-minus"></i>
                          </button>       
                  </div>
              </div>
              <div class="row  mt-3">
                  <div class="col-2">
                      <label for=""class="form-label">School</label>
                  </div>
                  <div class="col-3">
                      <input type="text" name="education[${clone}][school]" class="form-control">
                  </div>
                  <div class="col-2">
                      <label for="" class="form-label">Degree</label>
                  </div>
                  <div class="col-3">
                      <input type="text" name="education[${clone}][degree]" class="form-control">
                  </div>
              </div>
              <div class="row  mt-3">
                  <div class="col-2">
                      <label for="" class="form-label">Start Date</label>
                  </div>
                  <div class="col-3">
                      <input type="date" name="education[${clone}][edu_start_date]" class="form-control">
                  </div>
                  <div class="col-2">
                      <label for="" class="form-label">End Date</label>
                  </div>
                  <div class="col-3">
                      <input type="date" name="education[${clone}][edu_end_date]" class="form-control">
                  </div>
              </div>
              <div class="row  mt-3">
                  <div class="col-2">
                      <label for="">Description</label>
                  </div>
                  <div class="col-8">
                      <textarea name="education[${clone}][edu_note]" cols="135" rows="2" class="form-control"></textarea>
                  </div>
              </div>
             
          <hr>
              </div>
      `);
  });
  function minusLess(id){
      $(`#clone_${id}`).remove();
  };

</script>

@endsection
