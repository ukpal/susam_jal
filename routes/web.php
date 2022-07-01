<?php

use App\Http\Controllers\Backend\AreaController;
use App\Http\Controllers\Backend\AttendanceController;
use App\Http\Controllers\Backend\CalenderController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\LeaveController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\SurveyorController;
use App\Http\Controllers\Backend\SurveyResponseController;
use App\Http\Controllers\Backend\SurveyScheduleController;
use App\Http\Controllers\Backend\SurveyTypeController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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
Route::get('/optimize-clear', function() {
    Artisan::call('optimize:clear');
    return 'View cache cleared';
});

// Route::get('form', function(){
//     return view('backend.pages.staff.form');
// });

Route::middleware(['isNotLoggedIn'])->group(function () {
    Route::get('/', function () {
        return view('backend.pages.auth.login');
    });
    Route::match(['GET','POST'],'/surveyor-login', [LoginController::class, 'surveyorLogin']);
    Route::match(['GET','POST'],'login', [LoginController::class, 'login']);
});

Route::middleware(['isLoggedIn'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);  
    Route::get('/dashboard-quick-view', [DashboardController::class, 'quickView']);  
    // Route::get('/change-password', [LoginController::class, 'changePassword']);

    Route::get('/my-survey', [SurveyScheduleController::class, 'fetchScheduledSurveys'])->middleware('role:surveyor,super admin');
    Route::get('/all-survey', [SurveyScheduleController::class, 'fetchSurveys'])->middleware('role:admin,supervisor,super admin');
    Route::get('/delete-survey/{survey_id}', [SurveyScheduleController::class, 'deleteSurvey'])->middleware('role:admin,supervisor,super admin');
    Route::match(['GET','POST'],'/assign-survey', [SurveyScheduleController::class, 'assignSurvey'])->middleware('role:admin,super admin');
    Route::get('/survey-types', [SurveyTypeController::class, 'getAllSurveyTypes'])->middleware('role:admin,super admin');
    Route::match(['GET','POST'],'/edit-survey-type/{type_id?}', [SurveyTypeController::class, 'editSurveyType'])->middleware('role:admin,super admin');
    Route::get('/view-survey-template/{type_name?}', [SurveyTypeController::class, 'viewSurveyTemplate'])->middleware('role:admin,super admin');
    Route::get('/survey-responses/{survey_id}/type/{survey_type_id}', [SurveyResponseController::class, 'getSurveyResponses'])->middleware('role:surveyor,super admin');
    Route::get('/all-responses/{survey_id}/{template_id}', [SurveyResponseController::class, 'AllSurveyResponses'])->middleware('role:admin,super admin');
    Route::match(['GET','POST'],'/new-survey-response/{survey_id?}', [SurveyResponseController::class, 'newSurveyResponse'])->middleware('role:surveyor,super admin');
    Route::get('/view-response/{response_id}/template/{template_id}', [SurveyResponseController::class, 'viewResponse'])->middleware('role:surveyor');
    Route::get('checkSurveyorByDate/{start_date}/{end_date}/{survey_id?}', [SurveyScheduleController::class, 'checkSurveyorByDate'])->middleware('role:admin,super admin');
    Route::match(['GET','POST'],'edit-assign-survey/{survey_id?}', [SurveyScheduleController::class, 'editAssignSurvey'])->middleware('role:admin,super admin');
    Route::match(['GET','POST'],'edit-response/{response_id?}/{template_name?}', [SurveyResponseController::class, 'editResponse'])->middleware('role:admin,super admin');
    Route::get('response-pdf/{response_id}/{template_name}', [SurveyResponseController::class, 'responsePdf'])->middleware('role:admin,super admin');


    Route::get('/employees', [EmployeeController::class, 'getAllEmployees'])->middleware('role:admin,super admin');
    Route::get('/delete-employee/{emp_id}', [EmployeeController::class, 'deleteEmployee'])->middleware('role:admin,super admin');
    Route::match(['GET','POST'],'new-employee', [EmployeeController::class, 'newEmployee'])->middleware('role:admin,super admin');
    Route::match(['GET','POST'],'edit-employee/{emp_id?}', [EmployeeController::class, 'editEmployee'])->middleware('role:admin,super admin');
    Route::match(['GET','POST'],'update-profile', [EmployeeController::class, 'updateProfile']);


    Route::get('/surveyors', [SurveyorController::class, 'getAllSurveyors'])->middleware('role:admin,super admin');
    Route::match(['GET','POST'],'new-surveyor', [SurveyorController::class, 'newSurveyor'])->middleware('role:admin,super admin');
    Route::match(['GET','POST'],'edit-surveyor/{surveyor_id?}', [SurveyorController::class, 'editSurveyor'])->middleware('role:admin,super admin');


    Route::get('/users', [UserController::class, 'getAllUsers'])->middleware('role:admin,super admin');      
    Route::get('/delete-user/{user_id}', [UserController::class, 'deleteUser'])->middleware('role:admin,super admin');      
    Route::match(['GET','POST'],'new-user', [UserController::class, 'newUser'])->middleware('role:admin,super admin');
    Route::match(['GET','POST'],'edit-user/{user_id?}', [UserController::class, 'editUser'])->middleware('role:admin,super admin');
    
    Route::match(['GET'],'calender/{current_month}/{year}', [CalenderController::class, 'monthlyCalender']);
    Route::match(['GET','POST'],'offdays', [CalenderController::class, 'offdays'])->middleware('role:admin,super admin');
    Route::match(['GET'],'delete-offday/{id}', [CalenderController::class, 'deleteOffday'])->middleware('role:admin,super admin');

    Route::get('/time-in', [AttendanceController::class,'timeIn']);
    Route::get('/time-out', [AttendanceController::class,'timeOut']);
    Route::match(['GET','POST'],'/activity-wrapup', [AttendanceController::class,'activityWrapup']);

    Route::match(['GET','POST'],'district',[AreaController::class,'district']);
    Route::get('delete-district/{id}',[AreaController::class,'deleteDistrict']);
    Route::match(['GET','POST'],'sub-division',[AreaController::class,'subDivision']);
    Route::get('delete-sub-division/{id}',[AreaController::class,'deleteSubDivision']);
    Route::match(['GET','POST'],'block',[AreaController::class,'block']);
    Route::get('delete-block/{id}',[AreaController::class,'deleteBlock']);
    Route::match(['GET','POST'],'gram-panchayat',[AreaController::class,'gramPanchayat']);
    Route::get('delete-gram-panchayat/{id}',[AreaController::class,'deleteGramPanchayat']);
    Route::match(['GET','POST'],'survey-areas',[AreaController::class,'surveyArea']);
    Route::get('delete-survey-area/{id}',[AreaController::class,'deleteSurveyArea']);

    Route::get('/leave-applications', [LeaveController::class,'getApplications']);
    Route::get('/all-leave-applications', [LeaveController::class,'getAllApplications']);
    Route::get('/delete-leave-application/{application_id}', [LeaveController::class,'deleteApplication']);
    Route::match(['GET','POST'],'new-leave-application', [LeaveController::class, 'newLeaveApplication']);
    Route::match(['GET','POST'],'new-leave-application', [LeaveController::class, 'newLeaveApplication']);
    Route::match(['GET','POST'],'edit-leave-application/{application_id?}', [LeaveController::class, 'editLeaveApplication']);
});

// Route::get('/change-password', function(){return view('backend.pages.staff.change_password');})->middleware('isLoggedIn');
Route::match(['GET','POST'],'/change-password', [LoginController::class, 'changePassword'])->middleware('isLoggedIn');
Route::get('/logout', [LoginController::class, 'logout'])->middleware('isLoggedIn');

