<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeaveController extends Controller
{
    public function getApplications()
    {
        $user_id = session()->get('loggedUser')->user_id;
        return view('backend.pages.leave.applications', [
            'data' => DB::table('leave_applications')->where('user_id', $user_id)->get()
        ]);
    }

    public function getAllApplications()
    {
        $data = DB::table('leave_applications')
            ->join('users', 'users.user_id', '=', 'leave_applications.user_id')
            ->join('employee_master', 'employee_master.emp_number', '=', 'users.emp_number')
            ->select('leave_applications.*', 'employee_master.name as emp')
            ->get();
        return view('backend.pages.leave.all_applications', ['data' => $data]);
    }

    public function newLeaveApplication(Request $request)
    {
        $user_id = session()->get('loggedUser')->user_id;
        if ($request->method() == 'POST') {
            if (DB::table('leave_applications')->insert(['user_id' => $user_id, 'start_date' => $request->start_date, 'end_date' => $request->end_date, 'description' => $request->description])) {
                return redirect('leave-applications')->with('success', 'new application created');
            } else {
                return redirect('leave-applications')->with('error', 'error in creating new application');
            }
        } else {
            return view('backend.pages.leave.new_application');
        }
    }

    public function deleteApplication(Request $request)
    {
        $application_id = decrypt($request->application_id);
        if (DB::table('leave_applications')->where('id', $application_id)->delete()) {
            return redirect('leave-applications')->with('success', ' application deleted');
        } else {
            return redirect('leave-applications')->with('error', 'error in deleting application');
        }
    }

    public function editLeaveApplication(Request $request)
    {
        if ($request->method() == 'POST') {
            $user_id = session()->get('loggedUser')->user_id;
            if (DB::table('leave_applications')->where('id', $request->id)->update(['status' => $request->status, 'comment' => $request->comment, 'user_id' => $user_id])) {
                return redirect('all-leave-applications')->with('success', ' application updated');
            } else {
                return redirect('all-leave-applications')->with('error', 'error in updating application');
            }
        } else {
            $application_id = decrypt($request->application_id);
            return view('backend.pages.leave.edit_application', [
                'data' => DB::table('leave_applications')->where('id', $application_id)->first()
            ]);
        }
    }
}
