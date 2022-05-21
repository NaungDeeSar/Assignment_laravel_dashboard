@extends('backend.layouts.app')
@section('title','create Dep')

@section('content')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <div>Create Department            
            </div>
        </div>
    </div>
</div> 
<div class="content">
    <div class="card">
        
        <div class="card-body">

          <form action="{{route('admin.admin-dep.store')}}" method="post" id="create">
            @csrf
              <div class="form-group">
                  <label for="">Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Enter department">
              </div>
            
            <div class="d-flex">              
                <button type="submit" class="btn btn-primary ml-2">Add</button>
            </div>
          </form>

        </div>
    </div>
</div>
@endsection

@section('scripts')
{!! JsValidator::formRequest('App\Http\Requests\department','#create') !!} 
@endsection