@extends('backend.layouts.default')
@section('page_title', 'amrut_water_body_wise_data')
@section('content')

{{-- commercial setup survey --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">AMRUT WATER BODY WISE DATA
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
                      </div>
                      <div class="form-group mb-3">
                        <label>ULBs' Name</label>
                        <input type="text" class="form-control" name="ulb_name" value="{{$survey_details->ulb}}" readonly>
                      </div>
                      <div class="form-group mb-3">
                        <label>Ward No.</label>
                        <input type="text" class="form-control" name="ward_no" >
                      </div>
                      <div class="form-row">
                        
                        <div class="form-group mb-3 col-md-12">
                          <label>Location</label>
                          <input type="text" class="form-control" name="location">
                        </div>
                        <div class="form-group mb-3 col-md-12">
                          <label>Name of water body</label>
                          <input type="text" class="form-control" name="name_of_water_body">
                        </div>
                      
                        <div class="form-group mb-3 col-md-12">
                          <label>Type of water body</label>
                          <input type="text" class="form-control" name="type_of_water_body">
                       </div>
                       
                          <div class="form-group mb-3 col-md-12">
                            <label>Main purpose of use</label>
                              <select class="form-control" name="main_prupose_of_use">
                                <option selected value="">------select------</option>
                                   <option>Domestic</option>
                                   <option>Commercial</option>
                                   <option>Social</option>
                                   <option>Mixed</option>
                              </select>
                          </div>
                          <div class="form-group mb-3 col-md-12">
                            <label>No. Of per day users</label>
                            <input type="text" class="form-control" name="per_day_users" >
                          </div>
                        
                        <div class="form-group mb-3 col-md-12">
                          <label>Total area of water body (In Acr.)</label>
                          <input type="number" class="form-control" name="water_body_area" >
                        </div>
                        <div class="form-group mb-3 col-md-12">
                          <label>Source of waterT</label>
                          <select class="form-control" name="source_of_water" >
                            <option selected value="">------select------</option>
                            <option>Strom water</option>
                            <option>Water from canal</option>
                            <option>Water from religious place</option>
                            <option>Waste water through drain</option>
                            <option>Other</option>
                            
                          </select>
                        </div>
                        
                          <div class="form-group mb-3 col-md-12">
                            <label>There have any Parmanent ghat</label>
                            <select class="form-control" name="parmanent_ghat">
                              <option selected value="">------select------</option>
                                <option>Yes</option>
                                <option>No</option>
                            </select>
                          </div>
                          <div class="form-group mb-3 col-md-12">
                            <label>There have any waste collection facility in ghat</label>
                            <select class="form-control" name="waste_collection_in_ghat">
                              <option selected value="">------select------</option>
                              <option>Yes</option>
                              <option>No</option>
                          </select>
                          </div>
                          <div class="form-group mb-3 col-md-12">
                            <label>Last year of excavation</label>
                            <input type="text" class="form-control" name="last_year_of_excavation">
                          </div>
                        
                          <div class="form-group mb-3 col-md-12">
                            <label>Overall cleanness of Water Body</label>
                            <select class="form-control" name="overall_cleanness_of_water_body">
                              <option selected value="">------select------</option>
                              <option>Excellent</option>
                              <option>Verry Good</option>
                              <option>Good</option>
                              <option>Not so good</option>
                          </select>
                         </div>
                    
                         <button type="submit" class="btn btn-primary" {{(isset($readonly)) ? $readonly : ''}}>Submit</button>
                   
                </form>              
            </div>
        </div>
    </div>
</div>


@stop

