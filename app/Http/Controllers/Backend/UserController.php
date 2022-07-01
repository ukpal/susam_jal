<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getAllUsers()
    {
        $users = User::with('role')->get();
        return view('backend.pages.user.list', ['users' => $users]);
    }

    public function newUser(Request $request)
    {
        if ($request->method() == 'POST') {
            $user = new User();
            $user->emp_number = $request->emp_number;
            $user->password = Hash::make($request->password);
            $user->role_id = $request->role_id;
            if ($user->save()) {
                return redirect('users')->with('success', 'New User created successfully');
            } else {
                return back()->withInput();
            }
        } else {
            return view('backend.pages.user.edit', [
                'emps' => DB::table('employee_master')->leftJoin('users', 'users.emp_number', '=', 'employee_master.emp_number')->whereRaw("users.user_id is NULL")->select('employee_master.*', 'users.user_id')->get(),
                'roles' => Role::where('name', '!=', 'super admin')->get()
            ]);
        }
    }

    public function editUser(Request $request)
    {

        if ($request->method() == 'POST') {
            $response = User::where('user_id', $request->id)->update([
                'password' => Hash::make($request->password),
                'role_id' => $request->role_id
            ]);
            if ($response) {
                return redirect('users')->with('success', 'User updated successfully');
            } else {
                return back()->withInput()->with('error', 'User updation failed!!');
            }
        } else {
            $user_id = decrypt($request->user_id);
            return view('backend.pages.user.edit', [
                'user' => User::with('employee')->where('user_id', $user_id)->first(),
                'roles' => Role::all()
            ]);
        }
    }

    public function deleteUser(Request $request)
    {
        $user_id = decrypt($request->user_id);
        if (User::destroy($user_id)) {
            return redirect('users')->with('success', 'User deleted successfully');
        } else {
            return redirect('users')->with('error', 'User can\'t be deleted');
        }
    }
}
