@extends('backend.layouts.default')
@section('page_title', 'mswm_survey_for_water_body')
@section('content')

{{-- commercial setup survey --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">MSWM SURVEY FOR WATER BODY
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
                        <div class="form-group mb-3 col-md-12">
                            <label>District</label>
                            <input type="text" class="form-control" name="district" value="{{$survey_details->district}}" readonly>
                        </div>
                        <div class="form-group mb-3 col-md-12">
                            <label>Sub Division</label>
                            <input type="text" class="form-control" name="sub_division" value="{{$survey_details->subd}}" readonly>
                        </div>
                        <div class="form-group mb-3 col-md-12">
                            <label>ULBs'</label>
                            <input type="text" class="form-control" name="ulb_name" value="{{$survey_details->ulb}}" readonly>
                        </div>
                        <div class="form-group mb-3 col-md-12">
                            <label>Ward No.</label>
                            <input type="text" class="form-control" name="ward_no">
                        </div>
                        
                        <div class="form-group mb-3 col-md-12">
                            <label>Location</label>
                            <input type="text" class="form-control" name="location">
                        </div>
                        <div class="form-group mb-3 col-md-12">
                            <label>Name of water body</label>
                            <input type="text" class="form-control" name="name_of_water_body" >
                        </div>
                        <div class="form-group mb-3 col-md-12">
                            <label>Type of water body</label>
                            <select class="form-control" name="type_of_water_body" >
                                <option selected value="">------select------</option>
                                <option value="Pond">Pond</option>
                                <option value="Tank">Tank</option>
                                <option value="Lake">Lake</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                            
                        <div class="form-group mb-3 col-md-12">
                            <label>Main purpose of use</label>
                            <select class="form-control" name="main_prupose_of_use">
                                <option selected value="">------select------</option>
                                <option value="Residential">Residential</option>
                                <option value="Commercial">Commercial</option>
                                <option value="Social Activity">Social Activity</option>
                                <option value="Others">Others</option>
                                <option value="NA">NA</option>
                            </select>
                        </div>
                        
                        <div class="form-group mb-3 col-md-12">
                            <label>No. Of per day users</label>
                            <input type="number" class="form-control" name="per_day_users" >
                        </div>
                        <div class="form-group mb-3 col-md-12">
                            <label>Total area of water body (In Acr.)</label>
                            <input type="text" class="form-control" name="total_area_of_water_body">
                        </div>
                        
                        <div class="form-group mb-3 col-md-12">
                            <label>Source of water</label>
                                <select class="form-control" name="source_of_water">
                                    <option selected value="">------select------</option>
                                    <option value="Strom water">Strom water</option>
                                    <option value="Water from canal">Water from canal</option>
                                    <option value="Water from religious place">Water from religious place</option>
                                    <option value="Waste water through drain">Waste water through drain</option>
                                    <option value="Other">Other</option>
                                
                                </select>
                        </div>
                            <div class="form-group mb-3 col-md-12">
                            <label>There have any Parmanent ghat:</label>
                                <select class="form-control" name="any_parmanent_ghat">
                                    <option selected value="">------select------</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                        </div>
                        <div class="form-group mb-3 col-md-12">
                            <label>There have any waste collection facility in ghat</label>
                            <select class="form-control" name="waste_collection_facility_in_ghat">
                                <option selected value="">------select------</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        
                        <div class="form-group mb-3 col-md-12">
                            <label>Last year of excavation</label>
                            <input type="text" class="form-control" name="last_year_of_excavation">
                        </div>
                        
                        <div class="form-group mb-3 col-md-12">
                            <label>Overall cleanness of Water Body</label>
                            <select class="form-control" name="overall_cleanness_of_water_body" >
                                <option selected value="">------select------</option>
                                <option value="Excellent">Excellent</option>
                                <option value="Verry Good">Verry Good</option>
                                <option value="Good">Good</option>
                                <option value="Not so good">Not so good</option>
                            </select>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" {{(isset($readonly)) ? $readonly : ''}}>Submit</button>
                   
                </form>              
            </div>
        </div>
    </div>
</div>


@stop

