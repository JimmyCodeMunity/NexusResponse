<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmergencyMedicController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddlware;
use App\Http\Middleware\MedicMiddlware;
use App\Http\Middleware\UserMiddlware;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'home']);
Route::get('/requestemergency', [HomeController::class,'requestemergency']);
Route::post('/requestemergency', [ResponseController::class,'sendEmergency']);

Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified']);



//first route
Route::get('/login',[AuthController::class,'login']);
Route::post('/login',[AuthController::class,'Authlogin']);
Route::get('/logout',[AuthController::class,'logout']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [UserController::class, 'adduser']);

Route::get('/forgot-password', [AuthController::class, 'forgotpassword']);
Route::post('/forgotpassword', [AuthController::class, 'PostForgotPassword']);
Route::get('/reset/{token}', [AuthController::class, 'reset']);
Route::post('/reset/{token}', [AuthController::class, 'PostReset']);


Route::get('/forgotpassword',[AuthController::class,'forgotpassword']);
Route::get('/registeruser',[AuthController::class,'register']);


//emeail verfication
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');





//  Route::get('/admin/dashboard',function(){
//         return view('admin.dashboard');
//     });

//handle middlewares
//admin middleware

Route::middleware([AdminMiddlware::class])->group(function(){
    // Route::get('/admin/dashboard',function(){
    //     return view('admin.dashboard');
    // });

    //vidit admin add page
    Route::get('/admin/admin/add',function(){
        return view('admin.admin.add');
    });

    ///add new admin
    Route::get('/admin/dashboard',[AdminController::class, 'dashboard']);
    Route::post('/admin/admin/add',[AdminController::class, 'addadmin']);
    //get list of admins
    Route::get('/admin/admin/list',[AdminController::class, 'adminlist']);
    //visit admin edit page
    Route::get('/admin/admin/edit/{id}',[AdminController::class, 'adminedit']);
    Route::post('admin/admin/edit/{id}', [AdminController::class, 'updateadmin']);
    Route::get('admin/admin/delete/{id}', [AdminController::class, 'deleteadmin']);


    //view users route
    Route::get('/admin/user/list',[UserController::class,'userlist']);
    Route::get('/admin/user/add',[UserController::class,'adduserroute']);
    Route::post('/admin/user/add',[UserController::class,'adduser']);
    // Route::get('/admin/user/list',[UserController::class,'userlist']);
    Route::get('/admin/user/edit/{id}',[UserController::class, 'useredit']);
    Route::post('admin/user/edit/{id}', [UserController::class, 'updateuser']);
    Route::get('admin/user/delete/{id}', [UserController::class, 'deleteuser']);


    //medic routes
    Route::get('admin/medic/add',[MedicController::class,'addmedicroute']);
    Route::post('admin/medic/add',[MedicController::class,'addmedic']);
    Route::get('admin/medic/list',[MedicController::class,'mediclist']);
    Route::get('/admin/medic/edit/{id}',[MedicController::class, 'medicedit']);
    Route::post('admin/medic/edit/{id}', [MedicController::class, 'updatemedic']);
    Route::get('admin/medic/delete/{id}', [MedicController::class, 'deletemedic']);


    //emergency routes
    Route::get('/admin/emergencies/list',[ResponseController::class,'emergenciesroute']);
    Route::get('/admin/emergencies/assignedlist',[ResponseController::class,'assignedemergenciesroute']);
    // delete emergency
    Route::get('admin/emergencies/delete/{id}', [ResponseController::class, 'deleteemergency']);


    //assign emergency a medic
    Route::get('/admin/emergencies/assignmedic/{id}',[EmergencyMedicController::class, 'assignmedic']);
    Route::post('/admin/emergencies/assignmedic/{id}',[EmergencyMedicController::class, 'setassigned']);
    Route::get('admin/emergencies/delete/{id}', [EmergencyMedicController::class, 'deleteemergency']);
    
});



// //medic middleware
Route::middleware([MedicMiddlware::class])->group(function(){
    
    Route::get('/medic/dashboard',[MedicController::class,'medicdashboard']);
    Route::get('/medic/edit/{id}',[MedicController::class,'medicedit']);
    Route::get('admin/medic/markcomplete/{id}', [MedicController::class, 'markcomplete']);
    Route::get('admin/medic/list',[MedicController::class,'mediclist']);

    //view profile
    Route::get('/admin/medic/edit/{id}',[MedicController::class, 'medicedit']);
    Route::post('admin/medic/edit/{id}', [MedicController::class, 'updatemedic']);
});

// //user middleware
Route::middleware([UserMiddlware::class])->group(function(){
    
    Route::get('/user/dashboard',[UserController::class,'userdashboard']);


    //profile edit
    Route::get('/admin/user/edit/{id}',[UserController::class, 'useredit']);
    Route::post('admin/user/edit/{id}', [UserController::class, 'updateuser']);
});