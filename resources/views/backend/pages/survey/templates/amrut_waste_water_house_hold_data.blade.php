@extends('backend.layouts.default')
@section('page_title', 'amrut_waste_water_house_hold_data')
@section('content')

{{-- commercial setup survey --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">AMRUT-Waste Water Management
                    (Data collection from House Hold)                    
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
                        <input type="text" class="form-control" name="district" value="{{$survey_details->district}}" readonly>
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
                      <label>Habitation/Location name</label>
                      <input type="text" class="form-control" name="location_name" >
                    </div>
                    <div class="form-group mb-3">
                      <label>Holding No.</label>
                      <input type="text" class="form-control" name="holding_no" >
                    </div>
                    <div class="form-group mb-3">
                      <label>Head of the family</label>
                      <input type="text" class="form-control" name="head_of_the_family" >
                    </div>
                    <div class="form-group mb-3">
                      <label>Contact Number</label>
                      <input type="number" class="form-control" name="contact_no" >
                    </div>
                    <div class="form-group mb-3">
                      <label>No. of population</label>
                      <input type="text" class="form-control" name="no_of_population" >
                    </div>
                    <div class="form-group mb-3">
                      <label>There have any personal tube well </label>
                        <select class="form-control" name="personal_tubewell">
                            <option selected value="">------select------</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                      <label>Condition of tube well platform</label>
                      <input type="text" class="form-control" name="condition_of_tubewell" >
                    </div>
                    <div class="form-group mb-3">
                      <label>Toilet type</label>
                      <input type="text" class="form-control" name="toilet_type" >
                    </div>
                    <div class="form-group mb-3">
                      <label>There have any septic tank with Soack pit?</label>
                      <select class="form-control" name="septic_tank_with_soack_pit">
                            <option selected value="">------select------</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                      <label>Capacity of septic tank (in Ltr)</label>
                      <input type="number" class="form-control" name="capacity_of_septic_tank" >
                    </div>
                    <div class="form-group mb-3">
                      <label>last cleaning date </label>
                      <input type="date" class="form-control" name="last_cleaning_date" >
                    </div>
                    <div class="form-group mb-3">
                      <label>Building link with drain</label>
                      <select class="form-control" name="building_link_with_drain">
                            <option selected value="">------select------</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                      <label>Waste water generated per day in ltr</label>
                      <input type="number" class="form-control" name="waste_water_per_day" >
                    </div>
                    <div class="form-group mb-3">
                      <label>Any waste water re-use facility installed by ULBs'/Own</label>
                      <select class="form-control" name="re_use_waste_water">
                            <option selected value="">------select------</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                      <label>Any other information</label>
                      <input type="text" class="form-control" name="other_information" >
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary" {{(isset($readonly)) ? $readonly : ''}}>Submit</button>
                   
                </form>              
            </div>
        </div>
    </div>
</div>


@stop

