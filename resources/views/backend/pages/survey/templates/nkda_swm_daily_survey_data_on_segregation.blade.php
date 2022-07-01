@extends('backend.layouts.default')
@section('page_title', 'nkda_swm_daily_survey_data_on_segregation')
@section('content')

{{-- commercial setup survey --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">NKDA SWM DAILY SURVEY DATA ON SEGREGATION
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

                    <div class="form-group mb-3">
                        <label>Action Area</label>
                        <input type="text" class="form-control" name="action_area">               
                    </div>
                    <div class="form-group mb-3">
                        <label>Block Name/No</label>
                        <input type="text" class="form-control" name="block_name">
                    </div>
                    <div class="form-row">
                    <div class="form-group mb-3 col-md-12">
                        <label>Building No</label>
                        <input type="text" class="form-control" name="building_no">
                    </div>
                    <div class="form-group mb-3 col-md-12">
                        <label>Street No</label>
                        <input type="text" class="form-control" name="street_no">
                    </div>
                    <div class="form-group mb-3 col-md-12">
                        <label>Building Name</label>
                        <input type="text" class="form-control" name="building_name">
                    </div>
            
                    <div class="form-group mb-3 col-md-12">
                        <label>Name of Building owner</label>
                        <input type="text" class="form-control" name="building_owner">
                    </div>
            
                    <div class="form-group mb-3 col-md-12">
                        <label>Building Type</label>
                        <select class="form-control" name="building_type">
                            <option selected value="">------select------</option>
                            <option value="Individual">Individual</option>
                            <option value="Gated Co-Operative">Gated Co-Operative</option>
                            <option value="Guest House">Guest House</option>
                            <option value="Hotel, Restaurant">Hotel, Restaurant</option>
                            <option value="Commercial building">Commercial building</option>
                            <option value="Market">Market</option>
                            <option value="Shops">Shops</option>
                            <option value="Housing Complex">Housing Complex</option>
                            <option value="Combo(residential-office-canteen)">Combo(residential-office-canteen)</option>
                            <option value="Others">Others</option>
                            <option value="NA">NA</option>
                        </select>
                    </div>
                    <div class="form-group mb-3 col-md-12">
                        <label>Use of Building</label>
                        <select class="form-control" name="use_of_building">
                            <option selected value="">------select------</option>
                            <option>Residential</option>
                            <option>Commercial</option>
                            <option>Social Activity</option>
                            <option>Others</option>
                            <option>NA</option>
                        </select>
                    </div>
            
                    <div class="form-group mb-3 col-md-12">
                        <label>If it is complex, No. of apartment</label>
                        <input type="number" class="form-control" name="no_of_apartment">
                    </div>
                    <div class="form-group mb-3 col-md-12">
                        <label>Buildings; Head/Society head/Caretaker name:</label>
                        <input type="text" class="form-control" name="building_caretaker_name">
                    </div>
            
                    <div class="form-group mb-3 col-md-12">
                        <label>Buildings’ Caretaker contact no.</label>
                        <input type="text" class="form-control" name="building_caretaker_no">
                    </div>
                    <div class="form-group mb-3 col-md-12">
                        <label>Meet with whom:</label>
                        <input type="text" class="form-control" name="meet_with_whom">
                    </div>
                    <div class="form-group mb-3 col-md-12">
                        <label>Contact No</label>
                        <input type="text" class="form-control" name="contact_no">
                    </div>
            
                    <div class="form-group mb-3 col-md-12">
                        <label>Population of building</label>
                        <input type="text" class="form-control" name="population_of_building">
                    </div>
            
                    <div class="form-group mb-3 col-md-12">
                        <label>Waste generated per day (in Kg):</label>
                        <input type="text" class="form-control" name="per_day_waste">
                    </div>
                    <div class="form-group mb-3 col-md-12">
                        <label>Waste disposal practice</label>
                        <select class="form-control" name="waste_disposal_practice">
                            <option selected value="">------select------</option>
                            <option>Segregated</option>
                            <option>Mixed</option>
                        </select>
                    </div>
            
                    <div class="form-group mb-3 col-md-12">
                        <label>There have waste bin</label>
                        <select class="form-control" name="have_waste_bin">
                            <option selected value="">------select------</option>
                            <option>No any</option>
                            <option>Two Type</option>
                            <option>Three type</option>
                            <option>NA</option>
                        </select>
                    </div>
                    <div class="form-group mb-3 col-md-12">
                        <label>Is there any sticker or bar-code for waste collection found</label>
                        <select class="form-control" name="sticker_for_waste_collection">
                            <option selected value="">------select------</option>
                            @foreach (yesNoNotApplicable() as $key=>$value)
                                <option value="{{$value}}">{{$key}}</option>
                            @endforeach
                        </select>
                    </div>
            
                    <div class="form-group mb-3 col-md-12">
                        <label>Proposed time for waste collection: from ,to</label>
                        <input type="text" class="form-control" name="waste_collection_time">
                    </div>
                    <!-- <div class="form-group mb-3 col-md-12">
                            <label>Proposed time for waste collection: to </label>
                            <input type="text" class="form-control" name="water_supply_time">
                        </div> -->
                    <div class="form-group mb-3 col-md-12">
                        <label>Is there any scope of sanitary waste generation</label>
                        <select class="form-control" name="scope_of_sanitary_waste">
                            <option selected value="">------select------</option>
                            @foreach (yesNoNotApplicable() as $key=>$value)
                                <option value="{{$value}}">{{$key}}</option>
                            @endforeach
                        </select>
                    </div>
            
                    <div class="form-group mb-3 col-md-12">
                        <label>Is there any scope of bio-medical waste generation</label>
                        <select class="form-control" name="scope_of_bio_medical_waste">
                            <option selected value="">------select------</option>
                            @foreach (yesNoNotApplicable() as $key=>$value)
                                <option value="{{$value}}">{{$key}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3 col-md-12">
                        <label>Who provide waste collection facility</label>
                        <select class="form-control" name="waste_collection_provider">
                            <option selected value="">------select------</option>
                            <option>NKDA</option>
                            <option>Private</option>
                            <option>NA</option>
                        </select>
                    </div>
                    <div class="form-group mb-3 col-md-12">
                        <label>Is there any waste management initiative by self</label>
                        <select class="form-control" name="self_initiative_waste_management">
                            <option selected value="">------select------</option>
                            @foreach (yesNoNotApplicable() as $key=>$value)
                                <option value="{{$value}}">{{$key}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3 col-md-12">
                        <label>Is there found any open disposal of daily fresh waste</label>           
                        <select class="form-control" name="open_disposal_of_daily_fresh_waste">
                            <option selected value="">------select------</option>
                            @foreach (yesNoNotApplicable() as $key=>$value)
                                <option value="{{$value}}">{{$key}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3 col-md-12">
                        <label>Other information </label>
                        <input type="text" class="form-control" name="other_information">
                    </div>
                    
                    <button type="submit" class="btn btn-primary" {{(isset($readonly)) ? $readonly : ''}}>Submit</button>
                   
                </form>              
            </div>
        </div>
    </div>
</div>

@stop



