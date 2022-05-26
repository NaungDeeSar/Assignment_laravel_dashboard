<?php

use App\Models\city;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\EmployeeController;
use App\Http\Controllers\api\PositionController;
use NunoMaduro\Collision\Adapters\Phpunit\State;
use App\Http\Controllers\Api\DepartmentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Department api
Route::apiResource('/department',Api\DepartmentController::class);
//Position api
Route::apiResource('/position',Api\PositionController::class);
//

Route::apiResource('/employee',Api\EmployeeController::class);


Route::get('/employee/search/{name}',[EmployeeController::class,'search']);
// Route::get('state',function(){
//     return response()->json(State::all());
// });



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