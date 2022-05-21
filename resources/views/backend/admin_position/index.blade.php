@extends('backend.layouts.app')
@section('title','admin Postion')
@section('position-active','mm-active')
@section('content')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fas fa-biohazard"></i>
            </div>
            <div>
                Position            
            </div>
        </div>
    </div>
</div> 
<a href="{{route('admin.position.create')}}" class="btn btn-primary my-2">
    <i class="fas fa-plus-circle"></i>
    Create Position
</a>
<div class="content">
  
    <div class="card">
        
        <div class="card-body">
            <table id="Datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                      
                        <th>Name</th>     
                        <th>Price</th> 
                        <th>Department</th>                  
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                   
                    @foreach ($positions as $position)
                    <tr>
                      
                         <td>{{$position->name}}</td>
                         <td>{{$position->price}}</td>
                         <th>{{$position->department->name}}</th>
                         <td>
                             <a href="{{route('admin.position.edit',$position->id)}}">
                                 <i class="fas fa-edit"></i>
                             </a>                           |
                    
                            <form  method="post" action="{{route('admin.position.destroy',$position->id)}}" class="d-inline-block">
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

        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection