@extends('backend.layouts.default')
@section('page_title', 'amrut_dw_house_hold_level_data')
@section('content')

{{-- commercial setup survey --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">AMRUT DW HOUSE HOLD LEVEL DATA
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
                        <label>ULBs' Name</label>
                        <input type="text" class="form-control" name="ulb_name" value="{{$survey_details->ulb}}" readonly>
                      </div>
                      <div class="form-group mb-3">
                        <label>Ward No.</label>
                        <input type="text" class="form-control" name="wand_no" >
                      </div>
                      <div class="form-row">
                        <div class="form-group mb-3 col-md-12">
                          <label>Habitation Name</label>
                          <input type="text" class="form-control" name="habitation">
                        </div>
                        <div class="form-group mb-3 col-md-12">
                          <label>Holding No</label>
                          <input type="text" class="form-control" name="holding_no">
                        </div>
                        <div class="form-group mb-3 col-md-12">
                          <label>Head of the family name</label>
                          <input type="text" class="form-control" name="head_of_family">
                        </div>
                        <div class="form-group mb-3 col-md-12">
                          <label>Contact No.</label>
                          <input type="number" class="form-control" name="contact_no" >
                        </div>
                        <div class="form-group mb-3 col-md-12">
                          <label>User Type (Single/Multi)</label>
                          <input type="text" class="form-control" name="user_type" >
                        </div>
                        <div class="form-group mb-3 col-md-12">
                          <label>Total Family members</label>
                          <input type="text" class="form-control" name="total_family" >
                        </div>
                        <div class="form-group mb-3 col-md-12">
                          <label>Male</label>
                          <input type="text" class="form-control" name="male">
                        </div>
                        <div class="form-group mb-3 col-md-12">
                          <label>Female</label>
                          <input type="text" class="form-control" name="female">
                        </div>
                        <div class="form-group mb-3 col-md-12">
                          <label>Child (up to 8 years)</label>
                          <input type="text" class="form-control" name="child">
                        </div>
                        <div class="form-group mb-3 col-md-12">
                          <label>Type of Drinking water source</label>
                          <input type="text" class="form-control" name="water_source">
                       </div>
                       <div class="form-group mb-3 col-md-12">
                          <label> There have any Domestic Water Connection</label>
                          <input type="text" class="form-control" name="domestic_water" >
                        </div>
                        <div class="form-group mb-3 col-md-12">
                          <label>Size of ground water tank</label>
                          <input type="text" class="form-control" name="size_ground_water">
                       </div>
              
                        <div class="form-group mb-3 col-md-12">
                          <label>There have any Functional Watermeter/ferrule</label>
                          <input type="number" class="form-control" name="func_water_meter" >
                        </div>
                        <div class="form-group mb-3 col-md-12">
                            <label>There have any Non Functional Watermeter/ferrule</label>
                            <input type="text" class="form-control" name="non_func_water_meter" >
                        </div>
                        <div class="form-group mb-3 col-md-12">
                          <label>There have any unmeter</label>
                          <input type="text" class="form-control" name="unmeter">
                        </div>
                        <div class="form-group mb-3 col-md-12">
                          <label>Total time of water supply (All slots)</label>
                          <input type="text" class="form-control" name="total_water_time" >
                        </div>
                        <div class="form-group mb-3 col-md-12">
                          <label>Approx consumption (All members) in Ltr.</label>
                          <input type="text" class="form-control" name="approx_consumption" >
                        </div>
                        
                          
                          <div class="form-group mb-3 col-md-12">
                            <label>Any complain lodge to ULBs' on Drinking Water supply?</label>
                            <input type="text" class="form-control" name="complain_on_water">
                          </div>
                          <div class="form-group mb-3 col-md-12">
                            <label>Type of problem</label>
                            <input type="text" class="form-control" name="problem">
                          </div>
                          <div class="form-group mb-3 col-md-12">
                            <label>It was resolved?</label>
                            <input type="text" class="form-control" name="resolve">
                          </div>
                          <div class="form-group mb-3 col-md-12">
                            <label>If yes, How much time of resolve that issue</label>
                            <input type="text" class="form-control" name="resolve_time">
                          </div>
                          <div class="form-group mb-3 col-md-12">
                            <label>There have any multi user</label>
                            <input type="text" class="form-control" name="any_multi_user">
                          </div>
                        
                          <div class="form-group mb-3 col-md-12">
                            <label>If yes, pl provide same data through separate sheet</label>
                            <input type="text" class="form-control" name="same_data_sep_sheet">
                         </div>
                    
                         <button type="submit" class="btn btn-primary" {{(isset($readonly)) ? $readonly : ''}}>Submit</button>                   
                </form>              
            </div>
        </div>
    </div>
</div>


@stop

