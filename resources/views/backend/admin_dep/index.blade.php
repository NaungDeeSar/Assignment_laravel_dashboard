@extends('backend.layouts.app')
@section('title','admin dep')
@section('admin-dep-active','mm-active')
@section('content')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fas fa-chart-line"></i>
            </div>
            <div>Department            
            </div>
        </div>
    </div>
</div> 
<a href="{{route('admin.admin-dep.create')}}" class="btn btn-primary my-2">
    <i class="fas fa-plus-circle"></i>
    Create Department
</a>
<div class="content">
  
    <div class="card">
        
        <div class="card-body">
            <table id="Datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        
                        <th>ID</th>
                        <th>Name</th>                        
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                  
                    <?php 
                      $i=1;
                      ?>
                    @foreach ($deps as $dep)
                    <tr>
                       <td>{{$i++}}</td>
                         <td>{{$dep->name}}</td>
                         <td>
                             <a href="{{route('admin.admin-dep.edit',$dep->id)}}">
                                 <i class="fas fa-edit"></i>
                             </a>                           |
                    
                            <form  method="post" action="{{route('admin.admin-dep.destroy',$dep->id)}}" class="d-inline-block">
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