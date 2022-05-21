@extends('backend.layouts.app')
@section('title','Edit Position')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fas fa-edit"></i>
            </div>
            <div>Edit Position              
            </div>
        </div>
    </div>
</div> 
<div class="content">
    <div class="card">        
        <div class="card-body">
          <form action="{{route('admin.position.update',$pos->id)}}" method="post" id="update">
            @csrf
            @method('PUT')
              <div class="form-group">
                  <label for="">Name</label>
                  <input type="text" class="form-control" name="name" value="{{$pos->name}}">
              </div>
              <div class="form-group">
                <label for="">Price</label>
                <input type="number" name="price" class="form-control" placeholder="Enter Price" value="{{$pos->price}}">
            </div>
              <div class="form-group">
                <label class="control-label">Dep_id</label>
                <select name="dep_id" class="form-control">
                    <option value="">selected Option</option>
                    @foreach ($deps as $dep)
                    <option  value="{{$dep->id}}" {{ $dep->id == $pos->dep_id ? 'selected':'' }}>{{$dep->name}}</option>
                @endforeach

                </select>
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
