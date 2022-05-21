@extends('backend.layouts.app')
@section('title','Admin')
@section('admin-active','mm-active')
@section('content')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fas fa-cogs"></i>
            </div>
            <div>Dashboard               
            </div>
        </div>
    </div>
</div>  
<div class="row">
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-midnight-bloom">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Department</div>
                   
                </div>
                <div class="widget-content-right"  style="margin-left:30px">
                    <div class="widget-numbers text-white"><span>{{count($deps)}}</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-arielle-smile">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Position</div>
                   
                </div>
                <div class="widget-content-right"  style="margin-left:30px">
                    <div class="widget-numbers text-white"><span>{{count($pos)}}</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-grow-early">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left text-white">
                    <div class="widget-heading" style="display: left">Employees</div>
                    
                </div>
                <div class="widget-content-right" style="margin-left:30px">
                    <div class="widget-numbers text-white"> <span>{{count($users)}}</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-premium-dark">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Products Sold</div>
                    <div class="widget-subheading">Revenue streams</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-warning"><span>$14M</span></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection