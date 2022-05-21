
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>@yield('title')</title>

     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">
   
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">

<link href="{{asset('backend/css/main.css')}}" rel="stylesheet">

<link href="{{asset('backend/css/style.css')}}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">

<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
       @include('backend.layouts.header')     
             
         <div class="app-main">

              @include('backend.layouts.sidebar')    
                
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        
                       @yield('content')         
                       
                    </div>
                    {{-- <div class="app-wrapper-footer">
                        <div class="app-footer">
                            <div class="app-footer__inner">
                                <div class="app-footer-left">
                                   <span>footer</span>
                                </div>
                                <div class="app-footer-right">
                                    <span>developed by xxxxx</span>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
              
        </div>
    </div>
<script type="text/javascript" src="{{asset('backend/js/main.js')}}"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"> </script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"> </script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"> </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

{{--sweetalert2--}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 <!-- Laravel Javascript Validation -->
 <script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}">

</script>

<script>
    $(document).ready(function(){

     
        $('.back-btn').on('click',function(){
            window.history.go(-1);
            return false;
        });

        @if(session('create'))
        
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title:" {{session('create')}}",
            showConfirmButton: false,
            timer: 1500
            })
            @endif

            @if(session('update'))
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title:" {{session('update')}}",
            showConfirmButton: false,
            timer: 1500
            })
            @endif
    });
</script>
@yield('scripts')
</body>
</html>
