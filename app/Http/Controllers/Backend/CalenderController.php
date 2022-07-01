<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalenderController extends Controller
{
    public function monthlyCalender($current_Month, $year)
    {
        $date = mktime(12, 0, 0, $current_Month, 0, $year);
        $numberOfDays = cal_days_in_month(CAL_GREGORIAN, $current_Month, $year);
        $offset = date("w", $date);
        $row_number = 1;
        $offDays=DB::table('calender_master')->selectRaw('day(date) day,description')->whereRaw('month(date)='.$current_Month.' AND year(date)='.$year)->get();
        return view('backend.pages.staff.calender', [
            'numberOfDays' => $numberOfDays,
            'offset' => $offset,
            'current_Month' => $current_Month,
            'year' => $year,
            'offDays'=>json_decode(json_encode($offDays))
        ]);
    }

    public function offdays(Request $request){
        if($request->method()=='POST'){
            $res=DB::table('calender_master')->updateOrInsert(['date'=>$request->date],$request->except(['_token']));           
            if($res){
                return redirect()->back()->with('success', 'New date added successfully');
            }else{
                return redirect()->back()->with('error', 'new data can\'t be added');
            }
        }else{
            return view('backend.pages.leave.offdays',[
                'dates'=>DB::table('calender_master')->where('type','holiday')->get()
            ]);
        }
    }

    public function deleteOffday(Request $request){
        $id=decrypt($request->id);
        if (DB::table('calender_master')->where('id', $id)->delete()) {
            return redirect()->back()->with('success', 'Data deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Data can\'t be deleted');
        }
    }
}
