<?php

use App\Models\city;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Department;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/', function(){
//     return view('backend.home');
// });


//admin panel
Route::name('admin.')->namespace('Backend')->group(function(){    
   Route::get('/','PageController@home')->name('home');
   Route::resource('/admin-dep', 'DepartmentController');
   Route::resource('/position', 'PositionController');
   Route::resource('/user', 'EmployeeController');
   Route::get('/search','EmployeeController@search');
 
});


Route::get('employee/{id}/show',[PageController::class,'show']);
Route::get('employee/{id}/edit',[PageController::class,'edit']);

//getPosition id
Route::get('/getPosition/{id}',function($id){
    $position = Position::where('dep_id',$id)->get();
    return response()->json($position);
});

//getstate id
Route::get('/getState/{id}',function($id){
    $city = city::where('state_id',$id)->get();
    return response()->json($city);
});

//by department id
Route::get('/getDepartment/{id}',function($id){
        $dep=Department::findOrFail($id);
        $position =Position::where('id',$dep->id)->first();
        $user = Employee::where('position_id',$position->id)->get();
    return response()->json($user);
});



