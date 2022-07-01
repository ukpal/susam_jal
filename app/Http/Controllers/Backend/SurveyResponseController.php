<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SurveySchedule;
use App\Models\SurveyTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class SurveyResponseController extends Controller
{
    public function getSurveyResponses($survey_id, $survey_type_id)
    {
        $sId = decrypt($survey_id);
        $tId = decrypt($survey_type_id);
        $survey_type = DB::table('survey_types')->where('id', $tId)->first()->name;
        // $table_name = 'survey_response_' . $template->name;
        $user_id = session()->get('loggedUser')->user_id;
        // if ($template->name == 'template_02') {
        //     $response_lists = DB::table($table_name)->select('id', 'business_owner', 'ward_number', 'survey_response_time')->where([['survey_id', '=', $sId], ['user_id', '=', $user_id]])->orderBy('id', 'DESC')->get();
        // } else {
        //     $response_lists = DB::table($table_name)->select('id', 'head_of_family', 'survey_response_time')->where([['survey_id', '=', $sId], ['user_id', '=', $user_id]])->orderBy('id', 'DESC')->get();
        // }
        $response_lists=DB::table($survey_type)->select('id','ulb_name','ward_no', 'survey_response_time')->where([['survey_id', '=', $sId], ['surveyor_id', '=', $user_id]])->orderBy('id', 'DESC')->get();
        return view('backend.pages.survey.response_list', [
            'lists' => $response_lists,
            'survey_id' => $sId,
            // 'template_id' => $tId,
            // 'template_name' => $template->name
        ]);
    }

    public function newSurveyResponse(Request $request)
    {
        if ($request->method() == 'POST') {
            $table_name = $request->survey_type;
            $insertedId = DB::table($table_name)->insertGetId($request->except(['_token', 'survey_type']));
            $uploadFileData = [];
            if ($request->hasfile('signature')) {
                $file = $request->file('signature');
                $name = $file->getClientOriginalName();
                $name = time() . '.' . $name;
                $file->move('uploads/', $name);
                $uploadFileData['signature'] = $name;
            }
            if ($request->hasfile('other_file')) {
                $file = $request->file('other_file');
                $name = $file->getClientOriginalName();
                $name = time() . '.' . $name;
                $file->move('uploads/', $name);
                $uploadFileData['other_file'] = $name;
            }
            if (count($uploadFileData) > 0) {
                DB::table($table_name)->where('id', $insertedId)->update($uploadFileData);
            }
            return redirect('my-survey');
        } else {
            $sId = decrypt($request->survey_id);
            $survey_details = DB::table('survey_schedule')
            ->join('districts', 'districts.id', '=', 'survey_schedule.district_id')
            ->join('sub_divisions', 'sub_divisions.id', '=', 'survey_schedule.sub_division_id')
            ->join('ulbs', 'ulbs.id', '=', 'survey_schedule.ulb_id')
            ->join('survey_types', 'survey_types.id', '=', 'survey_schedule.survey_type_id')
            ->whereRaw("survey_schedule.id=" . $sId)
            ->select('survey_schedule.id','districts.name as district', 'sub_divisions.name as subd','ulbs.name as ulb', 'survey_types.name as survey_type')
            ->first();
            // $template = SurveyTemplate::where('id', $tId)->first();
            // $survey_type=DB::table('survey_types')->where('id', $tId)->first();
            return view('backend.pages.survey.templates.' . $survey_details->survey_type, [
                // 'user_id' => session()->get('loggedUser')->user_id,
                'survey_details'=>$survey_details
            ]);
        }
    }

    public function viewResponse($response_id, $template_id)
    {
        $id = decrypt($response_id);
        $tId = decrypt($template_id);
        $template = SurveyTemplate::where('id', $tId)->first();
        $table_name = 'survey_response_' . $template->name;
        $response = DB::table($table_name)->where([['id', '=', $id]])->first();
        return view('backend.pages.survey.view.' . $template->name, [
            'response' => $response,
        ]);
    }

    public function allSurveyResponses(Request $request)
    {
        $sId = decrypt($request->survey_id);
        $template = SurveyTemplate::where('id', decrypt($request->template_id))->first();
        $table_name = 'survey_response_' . $template->name;
        if ($template->name == 'template_02') {
            $response_lists = DB::table($table_name)->select('id', 'business_owner', 'ward_number', 'survey_response_time')->where([['survey_id', decrypt($request->survey_id)]])->orderBy('id', 'DESC')->get();
        } else {
            $response_lists = DB::table($table_name)->select('id', 'head_of_family', 'survey_response_time')->where([['survey_id', decrypt($request->survey_id)]])->orderBy('id', 'DESC')->get();
        }
        return view('backend.pages.survey.all_response_list', [
            'lists' => $response_lists,
            'template_name' => $template->name
        ]);
    }

    public function editResponse(Request $request)
    {
        if ($request->method() == 'POST') {
            $table_name = 'survey_response_' . $request->template_name;
            DB::table($table_name)->where('id', $request->id)->update($request->except(['_token', 'care_of_radio', 'template_name', 'id', 'survey_id', 'template_id']));
            $uploadFileData = [];
            if ($request->hasfile('signature')) {
                $file = $request->file('signature');
                $name = $file->getClientOriginalName();
                $name = time() . '.' . $name;
                $file->move('uploads/', $name);
                $uploadFileData['signature'] = $name;
            }
            if ($request->hasfile('other_file')) {
                $file = $request->file('other_file');
                $name = $file->getClientOriginalName();
                $name = time() . '.' . $name;
                $file->move('uploads/', $name);
                $uploadFileData['other_file'] = $name;
            }
            if (count($uploadFileData) > 0) {
                DB::table($table_name)->where('id', $request->id)->update($uploadFileData);
            }
            return back();
        } else {
            $id = decrypt($request->response_id);
            $template_name = decrypt($request->template_name);
            $table_name = 'survey_response_' . $template_name;
            return view('backend.pages.survey.edit.' . $template_name, [
                'response' => DB::table($table_name)->where([['id', '=', $id]])->first(),
                'template_name' => $template_name
            ]);
        }
    }

    public function responsePdf(Request $request)
    {
        $template_name = decrypt($request->template_name);
        $table_name = 'survey_response_' . $template_name;
        $data = DB::table($table_name)->where([['id', '=', decrypt($request->response_id)]])->first();
        return PDF::loadView('backend.pages.survey.pdf.' . $template_name, ['data' => $data])->download('Survey Result.pdf');
    }
}
