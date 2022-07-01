<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SurveyTypes;
use Illuminate\Http\Request;

class SurveyTypeController extends Controller
{
    public function getAllSurveyTypes()
    {
        $types = SurveyTypes::all();
        return view('backend.pages.survey.survey_types', ['types' => $types]);
    }

    public function editSurveyType(Request $request)
    {
        if ($request->method() == 'POST') {
            $response = SurveyTypes::where('id', $request->id)->update($request->except(['_token', 'id']));
            if ($response) {
                return redirect('survey-types')->with('success', 'Survey type updated successfully');
            } else {
                return back()->withInput()->with('error', 'Survey type updation failed!!');
            }
        } else {
            $id = decrypt($request->type_id);
            return view('backend.pages.survey.edit.survey_type', [
                'type' => SurveyTypes::find($id),
            ]);
        }
    }

    public function viewSurveyTemplate(Request $request)
    {
        try {
            $type_name = decrypt($request->type_name);
            // echo $type_name;
            return view('backend.pages.survey.templates.' . $type_name, [
                'readonly' => 'disabled'
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Survey template not found!!!');
        }
    }
}
