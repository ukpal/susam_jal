<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        return view('backend.pages.dashboard.dashboard');
    }

    public function quickView(){
        if(in_array(session()->get('loggedUser')->role, ['admin','supervisor','super admin'])){
            return view('backend.pages.dashboard.quick_view',[
                'emps'=>DB::table('employee_master')->count(),
                'users'=>DB::table('users')->count(),
                'surveyors'=>DB::table('surveyor_master')->count(),
                'surveys'=>DB::table('survey_schedule')->count(),
                'districts'=>DB::table('districts')->count()
            ]);
        }else{
            '<p></p>';
        }       
    }
}
