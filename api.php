<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Problem_typeController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\CommunicateController;
use App\Http\Controllers\Communication_statusController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\Ticket_employeeController;
use App\Http\Controllers\TicketController;
use App\Models\Problem_type;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::prefix('sections')->group(function(){
    Route::get('/',[SectionController::class,'index']);
    Route::post('/',[SectionController::class,'store']);
    Route::get('/show',[SectionController::class,'show']);
    Route::put('/',[SectionController::class,'update']);
    Route::delete('/',[SectionController::class,'destroy']);
});

Route::prefix('announcements')->group(function(){
    Route::get('/',[AnnouncementController::class,'index']);
    Route::post('/',[AnnouncementController::class,'store']);
    Route::get('/show',[AnnouncementController::class,'show']);
    Route::put('/',[AnnouncementController::class,'update']);
    Route::delete('/',[AnnouncementController::class,'destroy']);
});

Route::prefix('problem_types')->group(function(){
    Route::get('/',[Problem_typeController::class,'index']);
    Route::post('/',[Problem_typeController::class,'store']);
    Route::get('/show',[Problem_typeController::class,'show']);
    Route::put('/',[Problem_typeController::class,'update']);
    Route::delete('/',[Problem_typeController::class,'destroy']);
});

Route::prefix('comments')->group(function(){
    Route::get('/',[CommentController::class,'index']);
    Route::post('/',[CommentController::class,'store']);
    Route::get('/show',[CommentController::class,'show']);
    Route::put('/',[CommentController::class,'update']);
    Route::delete('/',[CommentController::class,'destroy']);
});

Route::prefix('communicates')->group(function(){
    Route::get('/',[CommunicateController::class,'index']);
    Route::post('/',[CommunicateController::class,'store']);
    Route::get('/show',[CommunicateController::class,'show']);
    Route::put('/',[CommunicateController::class,'update']);
    Route::delete('/',[CommunicateController::class,'destroy']);
});

Route::prefix('communication_statuses')->group(function(){
    Route::get('/',[Communication_statusController::class,'index']);
    Route::post('/',[Communication_statusController::class,'store']);
    Route::get('/show',[Communication_statusController::class,'show']);
    Route::put('/',[Communication_statusController::class,'update']);
    Route::delete('/',[Communication_statusController::class,'destroy']);
});

Route::prefix('customers')->group(function(){
    Route::get('/',[CustomerController::class,'index']);
    Route::post('/',[CustomerController::class,'store']);
    Route::get('/show',[CustomerController::class,'show']);
    Route::put('/',[CustomerController::class,'update']);
    Route::delete('/',[CustomerController::class,'destroy']);
});

Route::prefix('media')->group(function(){
    Route::get('/',[MediaController::class,'index']);
    Route::post('/',[MediaController::class,'store']);
    Route::get('/show',[MediaController::class,'show']);
    Route::put('/',[MediaController::class,'update']);
    Route::delete('/',[MediaController::class,'destroy']);
});

Route::prefix('ticket_employees')->group(function(){
    Route::get('/',[Ticket_employeeController::class,'index']);
    Route::post('/',[Ticket_employeeController::class,'store']);
    Route::get('/show',[Ticket_employeeController::class,'show']);
    Route::put('/',[Ticket_employeeController::class,'update']);
    Route::delete('/',[Ticket_employeeController::class,'destroy']);
});

Route::prefix('tickets')->group(function(){
    Route::get('/',[TicketController::class,'index']);
    Route::post('/',[TicketController::class,'store']);
    Route::get('/show',[TicketController::class,'show']);
    Route::put('/',[TicketController::class,'update']);
    Route::delete('/',[TicketController::class,'destroy']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});
