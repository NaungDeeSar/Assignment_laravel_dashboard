@extends('backend.layouts.app')
@section('title','Edit Dep')

@section('content')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fas fa-edit"></i>
            </div>
            <div>Edit Department              
            </div>
        </div>
    </div>
</div> 
<div class="content">
    <div class="card">
        
        <div class="card-body">

          <form action="{{route('admin.admin-dep.update',$dep->id)}}" method="post" id="update">
            @csrf
            @method('PUT')
              <div class="form-group">
                  <label for="">Name</label>
                  <input type="text" class="form-control" name="name" value="{{$dep->name}}">
              </div>
             
            <div class="d-flex">
                <button class="btn btn-danger back-btn">Cancel</button>
                <button type="submit" class="btn btn-primary ml-2">edit</button>
            </div>
          </form>

        </div>
    </div>
</div>
@endsection
