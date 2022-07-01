<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\SubDivision;
use App\Models\SurveyArea;
use App\Models\Surveyor;
use App\Models\SurveySchedule;
use App\Models\SurveyTemplate;
use App\Models\SurveyTypes;
use App\Models\SurveyUsers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Template\Template;

class SurveyScheduleController extends Controller
{
    public function fetchScheduledSurveys()
    {
        $user_id = session()->get('loggedUser')->user_id;
        $jobs = DB::table('survey_schedule')
            ->join('survey_users', 'survey_schedule.id', '=', 'survey_users.survey_id')
            ->join('survey_types', 'survey_types.id', '=', 'survey_schedule.survey_type_id')
            ->join('districts', 'districts.id', '=', 'survey_schedule.district_id')
            ->join('sub_divisions', 'sub_divisions.id', '=', 'survey_schedule.sub_division_id')
            ->join('ulbs', 'ulbs.id', '=', 'survey_schedule.ulb_id')
            ->whereRaw("end_date>=CURDATE() and start_date<=CURDATE() AND survey_users.surveyor_id=" . $user_id)
            ->select('survey_schedule.*', 'survey_types.name as survey', 'districts.name as district', 'sub_divisions.name as subd','ulbs.name as ulb')
            ->first();
        if (empty($jobs)) {
            return view('backend.pages.survey.my_survey');
        }
        $survey_type = DB::table('survey_types')->where('id',$jobs->survey_type_id)->first();
        // dd($template->name);
        $completed_survey = DB::table($survey_type->name)->where([['survey_id', '=', $jobs->id], ['surveyor_id', '=', $user_id]])->count();
        return view('backend.pages.survey.my_survey', [
            'jobs' => $jobs,
            'completed_survey' => $completed_survey
        ]);
    }

    public function fetchSurveys()
    {
        return view('backend.pages.survey.assign_survey_list', [
            'surveys' => SurveySchedule::with(['district', 'type', 'has_users'])->orderBy('id', 'DESC')->get()
        ]);
        // return response()->json(SurveySchedule::with(['district','survey_area'])->get());
    }

    public function assignSurvey(Request $request)
    {
        if ($request->method() == 'POST') {
            $schedule = new SurveySchedule();
            $schedule->survey_type_id = $request->survey_type_id;
            $schedule->district_id = $request->district_id;
            $schedule->sub_division_id = $request->sub_division_id;
            $schedule->ulb_id = $request->ulb_id;
            $schedule->start_date = $request->start_date;
            $schedule->end_date = $request->end_date;
            $schedule->no_of_survey = $request->no_of_survey;
            $schedule->save();
            foreach ($request->users as $u) {
                $data[] = ['survey_id' => $schedule->id, 'surveyor_id' => $u];
            }
            SurveyUsers::insert($data);
            return redirect('all-survey')->with('success', 'Survey created successfully');
        } else {
            return view('backend.pages.survey.assign_survey', [
                'districts' => District::all(),
                'subds' => SubDivision::all(),
                'ulbs' => DB::table('ulbs')->get(),
                'types' => SurveyTypes::where('is_active', 1)->get(),
                'users' => Surveyor::where('is_active', 1)->get(),
                'blocks' => DB::table('blocks')->get(),
                'gps' => DB::table('gram_panchayats')->get()
            ]);
        }
    }

    public function checkSurveyorByDate($start_date, $end_date, $survey_id = null)
    {
        // fetch data when edit survey
        if ($survey_id != null) {
            $d = SurveySchedule::whereRaw("end_date>='" . $start_date . "'")->whereRaw("start_date<='" . $end_date . "'")->whereRaw("id !=" . $survey_id)->with('has_users')->get();
            $user_arr = [];
            foreach ($d as $item) {
                foreach ($item->has_users as $u) {
                    array_push($user_arr, $u->surveyor_id);
                }
            }
            return response()->json($user_arr);
        }
        // fetch data when create new survey
        $d = SurveySchedule::whereRaw("end_date>='" . $start_date . "'")->whereRaw("start_date<='" . $end_date . "'")->with('has_users')->get();
        $user_arr = [];
        foreach ($d as $item) {
            foreach ($item->has_users as $u) {
                array_push($user_arr, $u->surveyor_id);
            }
        }
        return response()->json($user_arr);
    }

    public function editAssignSurvey(Request $request)
    {
        if ($request->method() == 'POST') {
            $schedule = SurveySchedule::find($request->id);
            $schedule->survey_type_id = $request->survey_type_id;
            $schedule->district_id = $request->district_id;
            $schedule->sub_division_id = $request->sub_division_id;
            $schedule->ulb_id = $request->ulb_id;
            $schedule->start_date = $request->start_date;
            $schedule->end_date = $request->end_date;
            $schedule->no_of_survey = $request->no_of_survey;
            $schedule->save();
            SurveyUsers::where('survey_id', $request->id)->delete();
            foreach ($request->users as $u) {
                $data[] = ['survey_id' => $request->id, 'surveyor_id' => $u];
            }
            SurveyUsers::insert($data);
            return redirect('all-survey')->with('success', 'Survey updated successfully');
        } else {
            $survey_id = decrypt($request->survey_id);
            $details = SurveySchedule::with(['district', 'type', 'has_users'])->where('id', $survey_id)->first();
            return view('backend.pages.survey.edit.assign_survey', [
                'survey' => $details,
                'districts' => District::all(),
                'specific_sub_division' => DB::table('sub_divisions')->where('district_id', $details->district_id)->get(),
                'specific_ulb' => DB::table('ulbs')->where('sub_division_id', $details->sub_division_id)->get(),
                'ulbs' => DB::table('ulbs')->get(),
                'subds' => DB::table('sub_divisions')->get(),
                'types' => SurveyTypes::where('is_active', 1)->get(),
                'users' => Surveyor::where('is_active', 1)->get()
            ]);
        }
    }

    public function deleteSurvey(Request $request)
    {
        $survey_id = decrypt($request->survey_id);
        if (SurveySchedule::destroy($survey_id)) {
            return redirect('all-survey')->with('success', 'Survey deleted successfully');
        } else {
            return redirect('all-survey')->with('error', 'Survey can\'t be deleted');
        }
    }
}
