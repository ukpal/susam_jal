@extends('backend.layouts.default')
@section('page_title', 'amrut_waste_water_basic_data_from_mun')
@section('content')

{{-- commercial setup survey --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">AMRUT-Waste Water Management
                    (Basic Data collection from Corporation/MuN/NAA/IT)                    
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
                      <label>Total length of drain (in Km)</label>
                      <input type="text" class="form-control" name="total_drain_length" >
                    </div>
                    <div class="form-group mb-3">
                      <label>No. of House Hold</label>
                      <input type="text" class="form-control" name="house_hold_no" >
                    </div>
                    <div class="form-group mb-3">
                      <label>No. of house Hold linked with drain</label>
                      <input type="text" class="form-control" name="house_hold_with_drain" >
                    </div>
                    <div class="form-group mb-3">
                      <label>No. of Market</label>
                      <input type="text" class="form-control" name="market_no" >
                    </div>
                    <div class="form-group mb-3">
                      <label>No. of market linked with drain</label>
                      <input type="text" class="form-control" name="market_with_drain" >
                    </div>
                    <div class="form-group mb-3">
                      <label>No. of Institution</label>
                      <input type="text" class="form-control" name="institution_no" >
                    </div>
                    <div class="form-group mb-3">
                      <label>No. of institution linked with drain</label>
                      <input type="text" class="form-control" name="institution_with_drain" >
                    </div>
                    <div class="form-group mb-3">
                      <label>No. of public urinal</label>
                      <input type="text" class="form-control" name="public_urinal_no" >
                    </div>
                    <div class="form-group mb-3">
                      <label>No. of public urinal linked with drain</label>
                      <input type="text" class="form-control" name="public_urinal_with_drain" >
                    </div>
                    <div class="form-group mb-3">
                      <label>No. of Community Sanitary Complex</label>
                      <input type="text" class="form-control" name="community_sanitary_complex_no" >
                    </div>
                    <div class="form-group mb-3">
                      <label>No. of Community Sanitary Complex linked with drain</label>
                      <input type="text" class="form-control" name="community_sanitary_complex_with_drain" >
                    </div>
                    <div class="form-group mb-3">
                      <label>No. of Housing complex</label>
                      <input type="text" class="form-control" name="housing_complex" >
                    </div>
                    <div class="form-group mb-3">
                      <label>No. of Housing complex linked with drain</label>
                      <input type="text" class="form-control" name="housing_complex_with_drain" >
                    </div>
                    <div class="form-group mb-3">
                      <label>There have any special drain for waste water management</label>
                      <input type="text" class="form-control" name="special_drain_for_waste_water" >
                    </div>
                    <div class="form-group mb-3">
                      <label>There have any special drain for only storm water</label>
                      <input type="text" class="form-control" name="special_drain_for_storm_water" >
                    </div>
                    <div class="form-group mb-3">
                      <label>No. of Tap point</label>
                      <input type="text" class="form-control" name="tap_point_no" >
                    </div>
                    <div class="form-group mb-3">
                      <label>No. of tap point linked with drain</label>
                      <input type="text" class="form-control" name="tap_point_with_drain" >
                    </div>
                    <div class="form-group mb-3">
                      <label>No. of Tube well</label>
                      <input type="text" class="form-control" name="tubewell_no" >
                    </div>
                    <div class="form-group mb-3">
                      <label>No. of Tube well linked with drain</label>
                      <input type="text" class="form-control" name="tubewell_with_drain" >
                    </div>
                    <div class="form-group mb-3">
                      <label>No. of septic tank</label>
                      <input type="text" class="form-control" name="septic_tank" >
                    </div>
                    <div class="form-group mb-3">
                      <label>No. of septic tank linked with drain</label>
                      <input type="text" class="form-control" name="septic_tank_with_drain" >
                    </div>
                    <div class="form-group mb-3">
                      <label>No. of cesspool</label>
                      <input type="text" class="form-control" name="cesspool_no" >
                    </div>
                    <div class="form-group mb-3">
                      <label>No. of FSTP </label>
                      <input type="text" class="form-control" name="fstp_no" >
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary" {{(isset($readonly)) ? $readonly : ''}}>Submit</button>
                   
                </form>              
            </div>
        </div>
    </div>
</div>


@stop

