@extends('backend.layouts.default')
@section('page_title', 'amrut_waste_water_institution_data')
@section('content')

{{-- commercial setup survey --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">AMRUT-Waste Water Management
                    (Data collection from Institution/Commercial Establishment/Community setup/etc)                    
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
                      <label>Ward No.</label>
                      <input type="text" class="form-control" name="ward_no" >
                    </div>
                    <div class="form-group mb-3">
                      <label>Habitation/Location name</label>
                      <input type="text" class="form-control" name="location_name" >
                    </div>
                    <div class="form-group mb-3">
                      <label>Institution name</label>
                      <input type="text" class="form-control" name="institution_name" >
                    </div>
                    <div class="form-group mb-3">
                      <label>Type of institution</label>
                      <select class="form-control" name="type_of_institution">
                            <option selected value="">------select------</option>
                            <option value="Education">Education</option>
                            <option value="Commercial">Commercial</option>
                            <option value="Social">Social</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                      <label>Head of the Institution</label>
                      <input type="text" class="form-control" name="head_of_institution" >
                    </div>
                    <div class="form-group mb-3">
                      <label>Contact Number of Head of Institution</label>
                      <input type="number" class="form-control" name="institution_head_contact_no" >
                    </div>
                    <div class="form-group mb-3">
                      <label>Types of building</label>
                      <select class="form-control" name="type_of_building">
                            <option selected value="">------select------</option>
                            <option value="Single">Single</option>
                            <option value="Multiple">Multiple</option>
                            <option value="Cluster">Cluster</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                      <label>No. of persons building uses</label>
                      <input type="text" class="form-control" name="no_of_person_uses_building" >
                    </div>
                    <div class="form-group mb-3">
                      <label>Main Water Source for Building</label>
                      <select class="form-control" name="main_water_source">
                            <option selected value="">------select------</option>
                            <option value="Own TW">Own TW</option>
                            <option value="Own Pump">Own Pump</option>
                            <option value="Municipal pipe line">Municipal pipe line</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                      <label>There have any tubewell </label>
                      <select class="form-control" name="any_tubewell">
                            <option selected value="">------select------</option>
                            <option value="Hand Pump">Hand Pump</option>
                            <option value="Submersible">Submersible</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                      <label>Condition of tubewell platform </label>
                      <select class="form-control" name="tubewell_condition">
                            <option selected value="">------select------</option>
                            <option value="Good">Good</option>
                            <option value="Bad">Bad</option>
                            <option value="Not Available">Not Available</option>
                            <option value="NA">NA</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                      <label>Toilet type </label>
                      <select class="form-control" name="toilet_type">
                            <option selected value="">------select------</option>
                            <option value="Twin Pit">Twin Pit</option>
                            <option value="Septic Tank">Septic Tank</option>
                            <option value="Other">Other</option>
                        </select>
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
                      <label>Capacity of septic tank (in Lrt)</label>
                      <input type="number" class="form-control" name="capacity_of_septic_tank" >
                    </div>
                    <div class="form-group mb-3">
                      <label>last cleaning date</label>
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
                      <input type="number" class="form-control" name="per_day_waste_water" >
                    </div>
                    <div class="form-group mb-3">
                      <label>Any practices of re-use waste water after treatment</label>
                      <select class="form-control" name="re_use_waste_water">
                            <option selected value="">------select------</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                      <label>How amount waste water re-uses per day? (in Ltr)</label>
                      <input type="number" class="form-control" name="amount_of_re_use_waste_water" >
                    </div>
                    <div class="form-group mb-3">
                      <label>Other information</label>
                      <input type="text" class="form-control" name="other_information" >
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary" {{(isset($readonly)) ? $readonly : ''}}>Submit</button>
                   
                </form>              
            </div>
        </div>
    </div>
</div>


@stop

