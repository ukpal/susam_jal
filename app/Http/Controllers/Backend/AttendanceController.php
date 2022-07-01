<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    public function timeIn(Request $request)
    {
        $user_id = session()->get('loggedUser')->user_id;
        if (empty(session()->get('loggedUser')->time_in)) {
            DB::table('attendance')->insert(['user_id' => $user_id, 'time_in' => date("Y-m-d H:i:s")]);
            $sessionData = session()->get('loggedUser');
            $sessionData->time_in = date("Y-m-d H:i:s");
            session()->forget('loggedUser');
            session()->put('loggedUser', $sessionData);
            // print_r($sessionData);
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function timeOut(Request $request)
    {
        $user_id = session()->get('loggedUser')->user_id;
        $work_activity = DB::table('work_activity')->whereRaw("date(date)=CURDATE() and user_id=" . $user_id)->first();
        if (!empty($work_activity) && empty(session()->get('loggedUser')->time_out)) {
            DB::table('attendance')->where('user_id', $user_id)->update(['time_out' => date("Y-m-d H:i:s")]);
            $sessionData = session()->get('loggedUser');
            $sessionData->time_out = date("Y-m-d H:i:s");
            session()->forget('loggedUser');
            session()->put('loggedUser', $sessionData);
            return redirect()->back();
        } else {
            return redirect()->back()->with('error', 'You should first wrap-up your activity for today!!');
        }
    }

    public function activityWrapup(Request $request)
    {
        $user_id = session()->get('loggedUser')->user_id;
        if ($request->method() == 'POST') {
            DB::table('work_activity')->where([['user_id', $user_id], ['date', date("Y-m-d")]])->delete();
            foreach ($request->activities as $value) {
                $data[] = ['user_id' => $user_id, 'date' => date("Y-m-d H:i:s"), 'activity' => $value];
            }
            DB::table('work_activity')->insert($data);
            return redirect('activity-wrapup')->with('success', 'Your activity submitted');
        } else {
            $wrapped = DB::table('work_activity')->where([['user_id', $user_id], ['date', date("Y-m-d")]])->get('activity');
            $arr = [];
            foreach ($wrapped as $item) {
                foreach ($item as $u) {
                    array_push($arr, $u);
                    // echo $u;
                }
            }
            return view('backend.pages.activity.activity_wrapup', [
                'activities' => DB::table('activity_master')->where('is_active', 1)->get(),
                'wrapped' => $arr
            ]);
        }
    }
}
