@extends('backend.layouts.default')
@section('page_title', 'amrut_dw_gen_data')
@section('content')

{{-- commercial setup survey --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">AMRUT DW GEN DATA
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
                          <input type="text" class="form-control" name="distric" value="{{$survey_details->district}}" readonly>
                        </div>
                        <div class="form-group mb-3 col-md-12">
                          <label>Sub Division</label>
                          <input type="text" class="form-control" name="sub_division" value="{{$survey_details->subd}}" readonly>
                        </div>
                      </div>
                      <div class="form-group mb-3">
                        <label>Municipality</label>
                        <input type="text" class="form-control" name="ulb_name" value="{{$survey_details->ulb}}" readonly>
                      </div>
                      <div class="form-group mb-3">
                        <label>Number of Ward.</label>
                        <input type="number" class="form-control" name="ward_no" >
                      </div>
                      <div class="form-row">
                        <div class="form-group mb-3 col-md-12">
                          <label>House Hold</label>
                          <input type="text" class="form-control" name="house_hold">
                        </div>
                        <div class="form-group mb-3 col-md-12">
                          <label>No. of slum</label>
                          <input type="number" class="form-control" name="no_of_slum">
                        </div>
                        <div class="form-group mb-3 col-md-12">
                          <label>No. Of Apartments</label>
                          <input type="number" class="form-control" name="no_of_apartments">
                        </div>
                      
                        <div class="form-group mb-3 col-md-12">
                          <label>No. Of Society/Housing complex</label>
                          <input type="number" class="form-control" name="no_of_society">
                       </div>
                       
                          <div class="form-group mb-3 col-md-12">
                            <label>Market (Traditional)</label>
                            <input type="number" class="form-control" name="market_traditional" >
                          </div>
                          <div class="form-group mb-3 col-md-12">
                            <label>Market (Shopping mall)</label>
                            <input type="text" class="form-control" name="market_shopping_mall" >
                          </div>
                        
                        <div class="form-group mb-3 col-md-12">
                          <label>Unorganized shops</label>
                          <input type="number" class="form-control" name="unorganized_shops" >
                        </div>
                        <div class="form-group mb-3 col-md-12">
                          <label>No. Of ICDS</label>
                          <input type="number" class="form-control" name="no_of_icds" >
                        </div>
                        
                          <div class="form-group mb-3 col-md-12">
                            <label>No. Of Pry. School/SSK</label>
                            <input type="number" class="form-control" name="no_of_pry">
                          </div>
                          <div class="form-group mb-3 col-md-12">
                            <label>No. Of Upper Pry. School</label>
                            <input type="number" class="form-control" name="no_of_upper_pry">
                          </div>
                          <div class="form-group mb-3 col-md-12">
                            <label>No. Of College</label>
                            <input type="number" class="form-control" name="no_of_college">
                          </div>
                        
                          <div class="form-group mb-3 col-md-12">
                            <label>No. Of Other Educational Institute</label>
                            <input type="number" class="form-control" name="no_of_institute">
                         </div>
                         
                          <div class="form-group mb-3 col-md-12">
                            <label>No. Of Govt. Office</label>
                            <input type="number" class="form-control" name="no_gov_office" >
                          </div>
                          <div class="form-group mb-3 col-md-12">
                            <label>No. Of Students Hostel</label>
                            <input type="number" class="form-control" name="no_student_hostel" >
                          </div>
                        
                        <div class="form-group mb-3 col-md-12">
                          <label>No. Of Other Hostel/Mess/Boarding</label>
                          <input type="number" class="form-control" name="no_other_hostel" >
                        </div>
                        <div class="form-group mb-3 col-md-12">
                          <label>No. Of Bus Stand</label>
                          <input type="number" class="form-control" name="no_of_bus_stand" >
                        </div>
                        
                          <div class="form-group mb-3 col-md-12">
                            <label>No. Of Railway Station</label>
                            <input type="number" class="form-control" name="no_of_railway_st">
                          </div>
                          <div class="form-group mb-3 col-md-12">
                            <label>No. Of Airport</label>
                            <input type="number" class="form-control" name="no_of_airport">
                          </div>
                          <div class="form-group mb-3 col-md-12">
                            <label>No. Of River Ghat</label>
                            <input type="number" class="form-control" name="no_of_river_ghat">
                          </div>
                        
                          <div class="form-group mb-3 col-md-12">
                            <label>No. Of Crematorium</label>
                            <input type="number" class="form-control" name="no_of_crematorium">
                         </div>
                         <div class="form-group mb-3 col-md-12">
                          <label>No. Of Graveyard</label>
                          <input type="number" class="form-control" name="no_of_graveyard">
                        </div>
                        <div class="form-group mb-3 col-md-12">
                          <label>No. Of Community Hall</label>
                          <input type="number" class="form-control" name="no_of_community_hall">
                        </div>
                        <div class="form-group mb-3 col-md-12">
                          <label>No. Of Cinema Hall</label>
                          <input type="number" class="form-control" name="no_of_cinema_hall">
                        </div>
                        <div class="form-group mb-3 col-md-12">
                          <label>No. Of Restaurant</label>
                          <input type="number" class="form-control" name="no_of_restaurant" >
                        </div>
                      
                      <div class="form-group mb-3 col-md-12">
                        <label>No. Of Residential Hotels/Resorts</label>
                        <input type="number" class="form-control" name="no_of_residential" >
                      </div>
                      <div class="form-group mb-3 col-md-12">
                        <label>No. of Rain Water Harvesting unit</label>
                        <input type="number" class="form-control" name="water_harvesting_unit" >
                      </div>
                      
                        <div class="form-group mb-3 col-md-12">
                          <label>No. Of Water tank/Pond/Water body</label>
                          <input type="number" class="form-control" name="no_water_tank">
                        </div>
                        <div class="form-group mb-3 col-md-12">
                          <label>No. of Tube well (Hand Pump)</label>
                          <input type="number" class="form-control" name="no_tube_well">
                        </div>
                        <div class="form-group mb-3 col-md-12">
                          <label>No. of Tap (Stand post for DW)</label>
                          <input type="number" class="form-control" name="no_of_tap">
                        </div>
                      
                        <div class="form-group mb-3 col-md-12">
                          <label>Total Length of drain (in Mtr.)</label>
                          <input type="number" class="form-control" name="total_length_drain">
                       </div>
                       <div class="form-group mb-3 col-md-12">
                        <label>No. of STP/Other waste water treatment unit</label>
                        <input type="number" class="form-control" name="water_treatment_unit">
                      </div>
                      <div class="form-group mb-3 col-md-12">
                        <label>Other Institution</label>
                        <input type="text" class="form-control" name="other_institution">
                      </div>
                    
                      <button type="submit" class="btn btn-primary" {{(isset($readonly)) ? $readonly : ''}}>Submit</button>                   
                </form>              
            </div>
        </div>
    </div>
</div>


@stop

