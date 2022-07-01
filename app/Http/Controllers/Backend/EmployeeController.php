<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function getAllEmployees()
    {
        $emps = Employee::all();
        return view('backend.pages.employee.list', ['emps' => $emps]);
    }

    public function newEmployee(Request $request)
    {
        if ($request->method() == 'POST') {
            do {
                $emp_number = generateRandomCode();
                $emp = Employee::where('emp_number', $emp_number)->first();
            } while ($emp);
            // echo $emp_number;
            $request['emp_number'] = $emp_number;
            Employee::insert($request->except(['_token']));
            return redirect('employees')->with('success', 'New Employee added successfully');
        } else {
            return view('backend.pages.employee.edit');
        }
    }

    public function editEmployee(Request $request)
    {

        if ($request->method() == 'POST') {
            $response = Employee::where('emp_id', $request->id)->update($request->except(['_token', 'id']));
            if ($response) {
                return redirect('employees')->with('success', 'Employee data updated successfully');
            } else {
                return back()->withInput()->with('error', 'Employee data updation failed!!');
            }
        } else {
            $emp_id = decrypt($request->emp_id);
            return view('backend.pages.employee.edit', [
                'emp' => Employee::where('emp_id', $emp_id)->first(),
            ]);
        }
    }

    public function deleteEmployee(Request $request)
    {
        $emp_id = decrypt($request->emp_id);
        if (Employee::destroy($emp_id)) {
            return redirect('employees')->with('success', 'Employee deleted successfully');
        } else {
            return redirect('employees')->with('error', 'Employee can\'t be deleted');
        }
    }

    public function updateProfile(Request $request)
    {
        if ($request->method() == 'POST') {
            $emp = Employee::find(session()->get('loggedInEmp')->id);
            $emp->name = $request->name;
            $emp->mobile = $request->mobile;
            $emp->email = $request->email;
            $emp->address = $request->address;
            $emp->gender = $request->gender;
            // print_r($request->all());
            if (!empty($request->old_picture)) {
                unlink('uploads/' . $request->old_picture);
                $emp->profile_picture = NULL;
            }
            if ($request->hasfile('profile_picture')) {
                $file = $request->file('profile_picture');
                $name = $file->getClientOriginalName();
                $name = time() . '.' . $name;
                $file->move('uploads/', $name);
                $emp->profile_picture = $name;
            }
            $emp->save();
            return redirect('update-profile');
        } else {
            return view('backend.pages.staff.edit.profile', [
                'emp' => Employee::find(session()->get('loggedInEmp')->id),
            ]);
        }
    }
}
