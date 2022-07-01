<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AreaController extends Controller
{
    public function district(Request $request)
    {
        if ($request->method() == 'POST') {
            if (empty($request->id)) {
                DB::table('districts')->insert($request->except(['_token']));
                return redirect()->back();
            } else {
                DB::table('districts')->where('id', $request->id)->update(['name' => $request->name]);
                return redirect()->back();
            }
        } else {
            return view('backend.pages.area.district', [
                'dist' => DB::table('districts')->get()
            ]);
        }
    }

    public function subDivision(Request $request)
    {
        if ($request->method() == 'POST') {
            if (empty($request->id)) {
                DB::table('sub_divisions')->insert($request->except(['_token']));
                return redirect()->back();
            } else {
                DB::table('sub_divisions')->where('id', $request->id)->update(['name' => $request->name, 'district_id' => $request->district_id]);
                return redirect()->back();
            }
        } else {
            return view('backend.pages.area.sub_division', [
                'subd' => DB::table('sub_divisions')->join('districts', 'districts.id', '=', 'sub_divisions.district_id')->select('sub_divisions.*', 'districts.name as district')->get(),
                'dists' => DB::table('districts')->get()
            ]);
        }
    }

    public function block(Request $request)
    {
        if ($request->method() == 'POST') {
            if (empty($request->id)) {
                DB::table('blocks')->insert($request->except(['_token']));
                return redirect()->back();
            } else {
                DB::table('blocks')->where('id', $request->id)->update(['name' => $request->name,'sub_division_id'=>$request->sub_division_id]);
                return redirect()->back();
            }
        } else {
            return view('backend.pages.area.block', [
                'blocks' => DB::table('blocks')->join('sub_divisions', 'sub_divisions.id', '=', 'blocks.sub_division_id')->select('blocks.*', 'sub_divisions.name as subd')->get(),
                'subds' => DB::table('sub_divisions')->get()
            ]);
        }
    }

    public function gramPanchayat(Request $request)
    {
        if ($request->method() == 'POST') {
            if (empty($request->id)) {
                DB::table('gram_panchayats')->insert($request->except(['_token']));
                return redirect()->back();
            } else {
                DB::table('gram_panchayats')->where('id', $request->id)->update(['name' => $request->name,'block_id'=>$request->block_id]);
                return redirect()->back();
            }
        } else {
            return view('backend.pages.area.gram_panchayat', [
                'gp' => DB::table('gram_panchayats')->join('blocks', 'blocks.id', '=', 'gram_panchayats.block_id')->select('gram_panchayats.*', 'blocks.name as block')->get(),
                'blocks' => DB::table('blocks')->get()
            ]);
        }
    }

    public function surveyArea(Request $request)
    {
        if ($request->method() == 'POST') {
            if (empty($request->id)) {
                DB::table('survey_areas')->insert($request->except(['_token']));
                return redirect()->back();
            } else {
                DB::table('survey_areas')->where('id', $request->id)->update(['name' => $request->name,'sub_division_id'=>$request->sub_division_id]);
                return redirect()->back();
            }
        } else {
            return view('backend.pages.area.survey_areas', [
                'areas' => DB::table('survey_areas')->join('sub_divisions', 'sub_divisions.id', '=', 'survey_areas.sub_division_id')->select('survey_areas.*', 'sub_divisions.name as subd')->get(),
                'subds' => DB::table('sub_divisions')->get()
            ]);
        }
    }

    public function deleteDistrict(Request $request)
    {
        if ($request->id) {
            $id = decrypt($request->id);
            DB::table('districts')->where('id', $id)->delete();
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
    public function deleteSubDivision(Request $request)
    {
        if ($request->id) {
            $id = decrypt($request->id);
            DB::table('sub_divisions')->where('id', $id)->delete();
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
    public function deleteBlock(Request $request)
    {
        if ($request->id) {
            $id = decrypt($request->id);
            DB::table('blocks')->where('id', $id)->delete();
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
    public function deleteGramPanchayat(Request $request)
    {
        if ($request->id) {
            $id = decrypt($request->id);
            DB::table('gram_panchayats')->where('id', $id)->delete();
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
    public function deleteSurveyArea(Request $request)
    {
        if ($request->id) {
            $id = decrypt($request->id);
            DB::table('survey_areas')->where('id', $id)->delete();
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
