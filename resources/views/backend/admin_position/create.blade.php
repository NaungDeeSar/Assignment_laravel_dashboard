@extends('backend.layouts.app')
@section('title','create Postion')

@section('content')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <div>Create Position              
            </div>
        </div>
    </div>
</div> 
<div class="content">
    <div class="card">
        
        <div class="card-body">

          <form action="{{route('admin.position.store')}}" method="post" id="create">
            @csrf
              <div class="form-group">
                  <label for="">Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Enter position">
              </div>
              <div class="form-group">
                  <label for="">Price</label>
                  <input type="number" name="price" class="form-control" placeholder="Enter Price">
              </div>

              <div class="form-group">
                <label class="control-label">Dep_id</label>
                <select name="dep_id" class="form-control">
                    <option value="">selected Option</option>
                      @foreach($deps as $dep)
                    <option value="{{$dep->id}}">{{$dep->name}}</option>
                    @endforeach

                </select>
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
{!! JsValidator::formRequest('App\Http\Requests\Position','#create') !!}
@endsection