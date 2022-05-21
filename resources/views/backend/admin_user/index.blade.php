@extends('backend.layouts.app')
@section('title','admin User')
@section('user-active','mm-active')
@section('content')

<div class="container row">
    <div class="col-12">
        <div class="page-title-icon" style="font-size: 18px">
            <i class="fas fa-users"></i> Employees
        </div>
        
    </div>

</div> 
<hr>
<div class="container row my-3">
    <div class="col-12">
        <div class="text-info  d-inline float-left">
            <label for="">Search</label>
          
            <form class="d-flex">
                <input class="form-control" name="search" id="search" type="search" placeholder="Search" aria-label="Search" style="width: 300px">
              
              </form> 
    </div>
        
        <div class="float-right text-info">
             
            <label for="">Department</label>
        <select class="form-control" aria-label="Default select example" style="width: 300px" id="department">
            <option selected>All Department</option>
            @foreach($deps as $dep)
            <option value="{{$dep->id}}">{{$dep->name}}</option>
           @endforeach
          </select>
        </div>
    </div>
</div>


<div class="content my-4">
    <div class="container">
        <div class="row" id="myCard">
            @foreach ($users as $user)

          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="our-team shadow">
              <div class="picture">
                <img class="img-fluid" src="{{$user->photo}}">
              </div>
              <div class="team-content">
                <h5 class="name" style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">{{$user->name}}</h5>
                <h4 class="title">{{$user->position->department->name}}</h4>
                <h4 class="title text-info">{{$user->position->name}}</h4>
              </div>
              <ul class="social">
                <li>
                <a href="{{route('admin.user.show',$user->id)}}" class="" aria-hidden="true">
                    <i class="fas fa-eye"></i>
                </a>
            </li>
            <li>
                <a href="{{route('admin.user.edit',$user->id)}}" class="" aria-hidden="true">
                    <i class="fas fa-edit"></i>
                </a>
            </li>
            {{-- <li>
                <form  method="post" action="{{route('admin.user.destroy',$user->id)}}" class="d-inline-block">
                    @csrf
                    @method('DELETE')    
                    <button type="submit" name="onsubmit" class="btn btn-outline-info" >
                        <i class="fas fa-trash-alt"></i>

                    </button>
                </form>
              
            </li> --}}
              
            </ul>
            </div>
          </div>
          
        
          @endforeach
       
      </div>



    {{-- <table id="Datatable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
              
                <th>Name</th>     
                <th>email</th> 
                <th>phone</th>                  
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
           
            @foreach ($users as $user)
            <tr>
              
                 <td>{{$user->name}}</td>
                 <td>{{$user->email}}</td>
                 <th>{{$user->phone}}</th>
                 <td>
                     <a href="{{route('admin.user.edit',$user->id)}}">
                         <i class="fas fa-edit"></i>
                     </a>                           |
            
                    <form  method="post" action="{{route('admin.user.destroy',$user->id)}}" class="d-inline-block">
                        @csrf
                        @method('DELETE')    
                        <button type="submit" name="onsubmit" class="btn btn-outline-info" >
                            <i class="fas fa-trash-alt"></i>

                        </button>
                    </form>
                 </td>

            </tr>
                
            @endforeach
           
        </tbody>
    </table>
 --}}

   
</div>  

@endsection
@section('scripts')
<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    $(document).ready(function() {
            $('#department').on('change', function() {
               let dep_id = $(this).val();
               //alert(dep_id);
               if(dep_id) {
                   $.ajax({
                       url: '/getDepartment/'+ dep_id,
                       type: "GET",
                       data : {"_token":"{{ csrf_token() }}"},
                       dataType: "json",
                       success:function(data)                       
                       {
                        
                         if(data){
                           
                            
                             //$('#myCard').html(data);
                             $('#myCard').empty();
                            // $('#myCard').focus;
                            
                            
                                $.each(data, function(key ,user){
                                 console.log(user);
                               $('#myCard').append(`
                               
                               <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                 
                                 <div class="our-team shadow">
                                   <div class="picture">
                                     <img class="img-fluid" src="`+user.photo+`">
                                   </div>
                                   <div class="team-content">
                                     <h5 class="name">`+user.name+`</h5>
                                     <h4 class="title">`+user.phone+`</h4>
                                     <h4 class="title"></h4>
                                   </div>
                                   <ul class="social">
                                     <li>
                                     <a href="employee/`+user.id+`/show" class="" aria-hidden="true">
                                         <i class="fas fa-eye"></i>
                                     </a>
                                 </li>
                                 <li>
                                     <a href="employee/`+user.id+`/edit" class="" aria-hidden="true">
                                         <i class="fas fa-edit"></i>
                                     </a>
                                 </li>
                               
                                   
                                 </ul>
                                 </div>
                               </div>
                                                    
                                                    `);
                                                });
    
                           
                            // $.each(data, function(key , user){
                            //     //$('#myCard').html(data);
                              
                            // });

                        }else{
                             $('#myCard').empty();
                        }
                     }
                   });
               }else{
                $('#myCard').empty();
               }
            });
            });
</script>


<script>
    $(document).ready(function () {
        $('#search').on('keyup', function(){
            var value = $(this).val();
            $.ajax({
                type: "get",
                url: "{{route('admin.')}}",
                data: {'search':value},
                success: function (data) {
                    console.log(data);
                    $('#myCard').html(data);
                }
            });
        });
    });
</script>
@endsection