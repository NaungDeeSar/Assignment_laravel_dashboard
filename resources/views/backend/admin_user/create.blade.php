@extends('backend.layouts.app')
@section('title','create user')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <div>Create Employee              
            </div>
        </div>
    </div>
</div> 
<div class="content">
    <div class="card">
        
        <div class="card-body">

          <form action="{{route('admin.user.store')}}" method="post" id="create" enctype="multipart/form-data">
            @csrf
              <div class="form-group">
                  <label for="">Name</label>
                  <input type="text" class="form-control" name="name">
              </div>

              <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="">Phone</label>
                <input type="number" class="form-control" name="phone">
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <textarea  cols="2" rows="3" class="form-control" name="address"></textarea>              
            </div>
           <div class="form-group">
               <label for="">Department</label>
               <select name="dep_id" class="form-control" id="dep_id">
                   <option value="">selected Option</option>
                   @foreach ($deps as $dep)
                   <option value="{{$dep->id}}">{{$dep->name}}</option>
                   @endforeach                   
               </select>
           </div>
           <div class="form-group">
                <select name="position_id" class="form-control" id="position">
                </select>
           </div>    
           <div class="form-group">
               <label for="">States</label>
               <select name="state" id="state" class="form-control">
                <option value="state" hidden>Choose State</option>
                @foreach ($states as $state)
                    <option value="{{$state->id}}">{{$state->name}}</option>
                @endforeach


            </select>
           </div>
           <div class="form-group">
            <label for="">City</label>
            <select name="city" class="form-control" id="city">
            </select>
        </div>
           <div class="form-group">
               <label for="">DOB</label>
               <input type="date" value="2000-01-01" name="dob" class="form-control" id="dob" >
           </div>
           <div class="form-group">
            <label for="">Technical Skill</label>
            <input type="text" value="" name="skill" class="form-control">
        </div>
            <div class="form-group">
                <label for="">Photo</label><br>
                <input type="file"  name="photo">
            </div>           
            <hr/>

          {{-- work history start--}}
            <section class="workhistory">
                <div class="row">
                    <div class="col-12">
                        <h5 class="text-info  float-left">Work History</h5>
                        <span class="btn btn-success float-right" id="newWorkHistory">
                          <i class="fas fa-plus"></i>    
                        </span>
                    </div>
                </div>
                <div class="row  mt-3">
                    <div class="col-2">
                        <label for="" class="form-label">Position</label>
                    </div>
                    <div class="col-3">
                        <input type="text" name="workhistory[0][position_name]" class="form-control">
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">Company Name</label>
                    </div>
                    <div class="col-3">
                        <input type="text" name="workhistory[0][company_name]" class="form-control">
                    </div>
                </div>
                <div class="row align-items-center mt-3">
                    <div class="col-2">
                        <label for="" class="form-label">Start Date</label>
                    </div>
                    <div class="col-3">
                        <input type="date" name="workhistory[0][start_date]" class="form-control">
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">End Date</label>
                    </div>
                    <div class="col-3">
                        <input type="date" name="workhistory[0][end_date]" class="form-control">
                    </div>
                </div>
                <div class="row  mt-3">
                    <div class="col-2">
                        <label for="">Description</label>
                    </div>
                    <div class="col-8">
                        <textarea name="workhistory[0][note]" id="" cols="135" rows="2" class="form-control"></textarea>
                    </div>
                </div>
                <hr>
            </section>
            {{-- work history end --}}

            {{-- education start --}}
            
             <section class="education">
                <div class="row">
                    <div class="col-12">
                        <h5 class="text-info mt-3 d-inline float-left">Education</h5>
                        <span class="btn btn-success float-right text-light" id="addEducation">
                             <i class="fas fa-plus"></i>
                        </span>
                    </div>
                </div>

                <div class="row  mt-3">
                    <div class="col-2">
                        <label for=""class="form-label">School</label>
                    </div>
                    <div class="col-3">
                        <input type="text" name="education[0][school]" class="form-control">
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">Degree</label>
                    </div>
                    <div class="col-3">
                        <input type="text" name="education[0][degree]" class="form-control">
                    </div>
                </div>
                <div class="row  mt-3">
                    <div class="col-2">
                        <label for="" class="form-label">Start Date</label>
                    </div>
                    <div class="col-3">
                        <input type="date" name="education[0][edu_start_date]" class="form-control">
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">End Date</label>
                    </div>
                    <div class="col-3">
                        <input type="date" name="education[0][edu_end_date]" class="form-control">
                    </div>
                </div>
                <div class="row  mt-3">
                    <div class="col-2">
                        <label for="">Description</label>
                    </div>
                    <div class="col-8">
                        <textarea name="education[0][edu_note]" cols="135" rows="2" class="form-control"></textarea>
                    </div>
                </div>
               
            <hr>
             </section>
             {{-- education end --}}
            
            <div class="d-flex">              
                <button type="submit" class="btn btn-primary ml-2">
                    <i class="fas fa-save"></i> Save
                </button>
            </div>
          </form>

        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! JsValidator::formRequest('App\Http\Requests\employee','#create') !!} 
<script>
    $(document).ready(function() {
            $('#dep_id').on('change', function() {
               let dep_id = $(this).val();
               if(dep_id) {
                   $.ajax({
                       url: '/getPosition/'+dep_id,
                       type: "GET",
                       data : {"_token":"{{ csrf_token() }}"},
                       dataType: "json",
                       success:function(data)                       
                       {
                        
                         if(data){
                            $('#position').empty();
                            $('#position').append('<option hidden>Choose Position</option>');
                            $.each(data, function(key , position){
                                $('#position').append('<option value="'+ position.id +'">' + position.name + '</option>');
                            });
                        }else{
                            $('#position').empty();
                        }
                     }
                   });
               }else{
                 $('#position').empty();
               }
            });

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
    Swal.fire({
            position: 'top-right',
            icon: 'success',
            title:"Add Work Histroy",
            showConfirmButton: false,
            timer: 1000
            })
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
                <div class="row  mt-3">
                    <div class="col-2">
                        <label for="" class="form-label">Position</label>
                    </div>
                    <div class="col-3">
                        <input type="text" name="workhistory[${clone}][position_name]" class="form-control">
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">Company Name</label>
                    </div>
                    <div class="col-3">
                        <input type="text" name="workhistory[${clone}][company_name]" class="form-control">
                    </div>
                </div>
                <div class="row align-items-center mt-3">
                    <div class="col-2">
                        <label for="" class="form-label">Start Date</label>
                    </div>
                    <div class="col-3">
                        <input type="date" name="workhistory[${clone}][start_date]" class="form-control">
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">End Date</label>
                    </div>
                    <div class="col-3">
                        <input type="date" name="workhistory[${clone}][end_date]" class="form-control">
                    </div>
                </div>
                <div class="row  mt-3">
                    <div class="col-2">
                        <label for="">Description</label>
                    </div>
                    <div class="col-8">
                        <textarea name="workhistory[${clone}][note]" id="" cols="135" rows="2" class="form-control"></textarea>
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