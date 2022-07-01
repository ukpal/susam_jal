<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\LoginTransaction;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use stdClass;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->method() == 'POST') {
            $emp = DB::table('employee_master')
                ->join('users', 'users.emp_number', '=', 'employee_master.emp_number')
                ->join('roles', 'roles.role_id', '=', 'users.role_id')
                ->select('employee_master.*', 'users.*', 'roles.name as role', 'roles.is_active as role_active')
                ->where('employee_master.email', $request->email)
                ->first();
            if ($emp) {
                if ($request->password==$emp->password) {
                    if ($emp->role_active) {
                        $login_transaction = new LoginTransaction();
                        $login_transaction->user_id = $emp->user_id;
                        $login_transaction->login_time = date("Y-m-d H:i:s");
                        $login_transaction->login_latitude = $request->lat;
                        $login_transaction->login_longitude = $request->long;
                        if ($login_transaction->save()) {
                            $loggedUser = new stdClass();
                            $loggedUser->user_id = $emp->user_id;
                            $loggedUser->name = $emp->name;
                            $loggedUser->profile_picture = $emp->profile_picture;
                            $loggedUser->login_id = $login_transaction->id;
                            $loggedUser->default_password = $emp->default_password;
                            $loggedUser->role = $emp->role;
                            $attendance = DB::table('attendance')
                                ->whereRaw("date(time_in)=CURDATE() and user_id=" . $emp->user_id)
                                ->first();
                            if (!empty($attendance)) {
                                $loggedUser->time_in = $attendance->time_in;
                            } else {
                                $loggedUser->time_in = '';
                            }
                            if (!empty($attendance->time_out)) {
                                $loggedUser->time_out = $attendance->time_out;
                            } else {
                                $loggedUser->time_out = '';
                            }
                            // print_r($attendance);exit();
                            session()->put('loggedUser', $loggedUser);
                            return redirect('dashboard');
                        } else {
                            return back()->with('error', 'couldn\'t logged in');
                        }
                    } else {
                        return back()->with('error', 'You are not permitted to login');
                    }
                } else {
                    return back()->with('error', 'Wrong Password');
                }
            } else {
                return back()->with('error', 'Invalid Email');
            }
        } else {
            return view('backend.pages.auth.login');
        }
    }

    public function surveyorLogin(Request $request)
    {
        if ($request->method() == 'POST') {
            $surveyor = DB::table('surveyor_master')
                ->where([['phone', '=', $request->phone], ['password', '=', $request->password]])
                ->first();
            if ($surveyor) {
                if ($surveyor->is_active) {
                    $login_transaction = new LoginTransaction();
                    $login_transaction->user_id = $surveyor->surveyor_id;
                    $login_transaction->login_time = date("Y-m-d H:i:s");
                    $login_transaction->user_type = 'surveyor';
                    $login_transaction->login_latitude = $request->lat;
                    $login_transaction->login_longitude = $request->long;
                    if ($login_transaction->save()) {
                        $loggedUser = new stdClass();
                        $loggedUser->user_id = $surveyor->surveyor_id;
                        $loggedUser->name = $surveyor->name;
                        $loggedUser->profile_picture = $surveyor->profile_picture;
                        $loggedUser->login_id = $login_transaction->id;
                        $loggedUser->default_password = $surveyor->default_password;
                        $loggedUser->role = 'surveyor';
                        session()->put('loggedUser', $loggedUser);
                        return redirect('dashboard');
                    } else {
                        return back()->with('error', 'couldn\'t logged in');
                    }
                } else {
                    return back()->with('error', 'You are not permitted to login');
                }
            } else {
                return back()->with('error', 'Wrong password');
            }
        } else {
            return view('backend.pages.auth.surveyor_login');
        }
    }

    // public function login(Request $request)
    // {
    //     $emp = Employee::where('email', $request->email)->first();
    //     if ($emp) {
    //         if (Hash::check($request->password, $emp->user->password)) {
    //             if ($emp->user->role->is_active) {
    //                 $login_transaction = new LoginTransaction();
    //                 $login_transaction->user_id = $emp->user->id;
    //                 $login_transaction->login_time = date("Y-m-d H:i:s");
    //                 if ($login_transaction->save()) {
    //                     $emp->login_transaction_id = $login_transaction->id;
    //                     session()->put('loggedInEmp', $emp);
    //                     return redirect('dashboard');
    //                 } else {
    //                     return back()->with('error', 'couldn\'t logged in');
    //                 }
    //             } else {
    //                 return back()->with('error', 'You are not permitted to login');
    //             }
    //         } else {
    //             return back()->with('error', 'Wrong Password');
    //         }
    //     } else {
    //         return back()->with('error', 'Invalid Email');
    //     }
    // }

    public function logout(Request $request)
    {
        $login_id = session()->get('loggedUser')->login_id;
        $transaction = LoginTransaction::find($login_id);
        $transaction->logout_time = date("Y-m-d H:i:s");
        $transaction->logout_latitude = $request->lat;
        $transaction->logout_longitude = $request->long;
        session()->forget('loggedUser');
        return redirect('/');
    }

    public function changePassword(Request $request)
    {
        if ($request->method() == 'POST') {
            $user_id = session()->get('loggedUser')->user_id;
            if (session()->get('loggedUser')->role == 'surveyor') {
                $user = DB::table('surveyor_master')->where('surveyor_id', $user_id)->first();
                if ($user->password == $request->old_password) {
                    DB::table('surveyor_master')->where('surveyor_id', $user_id)->update([
                        'password' => $request->new_password,
                        'default_password' => 0
                    ]);
                    return redirect()->back()->with('success', 'Password successfully changed');
                } else {
                    return redirect()->back()->with('error', 'Old password does not match');
                }
            } else {
                $user = DB::table('employee_master')->where('emp_id', $user_id)->first();
                if ($user->password == $request->old_password) {
                    DB::table('surveyor_master')->where('surveyor_id', $user_id)->update([
                        'password' => $request->new_password,
                        'default_password' => 0
                    ]);
                    return redirect()->back()->with('success', 'Password successfully changed');
                } else {
                    return redirect()->back()->with('error', 'Old password does not match');
                }
            }
            $session_data = session()->get('loggedUser');
            $session_data->default_password = 0;
            session()->put('loggedUser', $session_data);
            // if (Hash::check($request->old_password, session()->get('loggedUser')->user->password)) {
            //     User::where('id', session()->get('loggedInEmp')->user->id)->update(['password' => Hash::make($request->new_password), 'default_password' => 0]);
            //     $emp = session()->get('loggedInEmp');
            //     $emp->user->default_password = 0;
            //     session()->put('loggedInEmp', $emp);
            // }
            return redirect('/dashboard');
        } else {
            return view('backend.pages.auth.change_password');
        }
    }
}
