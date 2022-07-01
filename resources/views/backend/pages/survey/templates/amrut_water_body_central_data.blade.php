@extends('backend.layouts.default')
@section('page_title', 'amrut_water_body_central_data')
@section('content')

{{-- commercial setup survey --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">AMRUT WATER BODY CENTRAL DATA
                    @if (session()->get('loggedUser')->role=='surveyor')
                    <a href="{{url('my-survey/')}}" class="float-end btn btn-secondary">Back</a>
                    @else
                    <a href="{{url('survey-types/')}}" class="float-end btn btn-secondary">Back</a>
                    @endif
                    
                </h5>
            </div>
            
            <div class="card-body">
                <form method="POST" action="{{url('new-survey-response')}}">
                  @csrf
                  <input type="hidden" name="survey_id" value="{{$survey_details->id}}">
                  <input type="hidden" name="survey_type" value="{{$survey_details->survey_type}}">
                  <input type="hidden" name="surveyor_id" value="{{session()->get('loggedUser')->user_id}}">
                    <div class="form-row">
                      <div class="form-group col-md-12 mb-3">
                        <label>District</label>
                        <input type="text" class="form-control" name="districT" value="{{$survey_details->district}}" readonly>
                      </div>
                      <div class="form-group col-md-12 mb-3">
                        <label>Sub Division</label>
                        <input type="text" class="form-control" name="sub_division" value="{{$survey_details->subd}}" readonly>
                      </div>
                    </div>
                    <div class="form-group mb-3">
                      <label>ULBs' Name</label>
                      <input type="text" class="form-control" name="ulb_name" value="{{$survey_details->ulb}}" readonly>
                    </div>
                    <div class="form-group mb-3">
                      <label>Does ULB have water body (i.e. Lakes, Ponds, Tanks, Stepwells / Baolis) in the city?</label>
                      <select class="form-control" name="ulb_have_water_body">
                            <option selected value="">------select------</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>If yes, total number of existing water bodies in the city</label>
                        <input type="text" class="form-control" name="no_of_existing_water_bodies" >
                    </div>
                    <div class="form-group mb-3">
                        <label>Total area of water bodies (If more than one then enter total area of all the water bodies)</label>
                        <input type="text" class="form-control" name="total_area_of_water_bodies" >
                    </div>
                    <div class="form-group mb-3">
                        <label>Does city rejuvenated water bodies before November 2021?</label>
                        <select class="form-control" name="rejuvenated_of_water_bodies_from_november_2021">
                            <option selected value="">------select------</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>                    
                    </div>
                    <div class="form-group mb-3">
                        <label>If yes, number of water bodies rejuvenated before November 2021</label>
                        <input type="text" class="form-control" name="no_of_rejuvenated_water_bodies_before_november">
                    </div>
                    <div class="form-group mb-3">
                        <label>Total area of water bodies that are rejuvenated before the November 2021 (If more than one then enter total area of all the water bodies that were rejuvenated)</label>
                        <input type="text" class="form-control" name="total_area_of_rejuvenated_water_bodies_before_november_2021">
                    </div>
                    <div class="form-group mb-3">
                        <label>Does city have plan to rejuvenate water bodies next year</label>
                        <select class="form-control" name="city_plan_to_rejunevated_water_bodies_nex_year">
                            <option selected value="">------select------</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>Does ULB conduct pre monsoon cleaning of water bodies ?</label>
                        <select class="form-control" name="ulb_conduct_pre_monsoon_cleaning">
                            <option selected value="">------select------</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>If yes, number of water bodies cleaned in this year</label>
                        <input type="text" class="form-control" name="no_of_ulb_pre_monsoon_cleaning">
                    </div>
                    <div class="form-group mb-3">
                        <label>The use of the existing water bodies by people or govt. for any specific purpose may be added for more precise information collection.</label>
                        <input type="text" class="form-control" name="use_water_bodies_for_specific_purpose">
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary" {{(isset($readonly)) ? $readonly : ''}}>Submit</button>
                   
                </form>              
            </div>
        </div>
    </div>
</div>


@stop

