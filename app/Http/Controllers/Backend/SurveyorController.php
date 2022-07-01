<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Surveyor;
use Illuminate\Http\Request;

class SurveyorController extends Controller
{
    public function getAllSurveyors()
    {
        $data = Surveyor::all();
        return view('backend.pages.surveyor.list', ['data' => $data]);
    }

    public function newSurveyor(Request $request)
    {
        if ($request->method() == 'POST') {
            Surveyor::insert([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'password'=>$request->phone,
                'address'=>$request->address,
                'gender'=>$request->gender,
            ]);
            return redirect('surveyors')->with('success', 'New Surveyor added successfully');
        } else {
            return view('backend.pages.surveyor.edit');
        }
    }

    public function editSurveyor(Request $request)
    {

        if ($request->method() == 'POST') {
            $response = Surveyor::where('surveyor_id', $request->id)->update($request->except(['_token', 'id']));
            if ($response) {
                return redirect('surveyors')->with('success', 'Surveyor updated successfully');
            } else {
                return back()->withInput()->with('error', 'Surveyor updation failed!!');
            }
        } else {
            $surveyor_id = decrypt($request->surveyor_id);
            return view('backend.pages.surveyor.edit', [
                'surveyor' => Surveyor::find($surveyor_id),
            ]);
        }
    }
}
