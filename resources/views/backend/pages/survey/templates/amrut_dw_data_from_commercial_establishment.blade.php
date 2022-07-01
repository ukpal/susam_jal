@extends('backend.layouts.default')
@section('page_title', 'amrut_dw_data_from_commercial_establishment')
@section('content')

{{-- commercial setup survey --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">AMRUT DW DATA FROM COMMERCIAL ESTABLISHMENT
                  @if (session()->get('loggedUser')->role=='surveyor')
                  <a href="{{url('my-survey/')}}" class="float-end btn btn-secondary">Back</a>
                  @else
                  <a href="{{url('survey-types/')}}" class="float-end btn btn-secondary">Back</a>
                  @endif
                </h5>
            </div>
            
            <div class="card-body">
                <form  method="POST" action="{{url('new-survey-response')}}">
                  @csrf
                  <input type="hidden" name="survey_id" value="{{$survey_details->id}}">
                  <input type="hidden" name="survey_type" value="{{$survey_details->survey_type}}">
                  <input type="hidden" name="surveyor_id" value="{{session()->get('loggedUser')->user_id}}">
                    <div class="form-row">
                      <div class="form-group col-md-12 mb-3">
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
                      <input type="text" class="form-control" name="ulb_name"  value="{{$survey_details->ulb}}" readonly>
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
                        <label>Location</label>
                        <input type="text" class="form-control" name="location">
                      </div>
                      <div class="form-group mb-3 col-md-12">
                        <label>Market/Commercial establishments' name:</label>
                        <input type="text" class="form-control" name="market_establish_name">
                      </div>
                    
                      <div class="form-group mb-3 col-md-12">
                        <label>Head/Proprietor/Caretaker/Agency Head of Staffs name</label>
                        <input type="text" class="form-control" name="head_of_staff_nm">
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
                        <label>Number of shops/stalls/etc</label>
                        <input type="number" class="form-control" name="no_of_shop" >
                      </div>
                      
                      <div class="form-group mb-3 col-md-12">
                        <label>Total water users (Approx)</label>
                        <input type="text" class="form-control" name="total_water_user" >
                      </div>
                      <div class="form-group mb-3 col-md-12">
                        <label>Type of Drinking water source</label>
                        <input type="text" class="form-control" name="water_source">
                     </div>
                     <div class="form-group mb-3 col-md-12">
                      <label>There have any Bulk Water Connection by ULBs'</label>
                      <input type="text" class="form-control" name="bulk_water" >
                    </div>
                    <div class="form-group mb-3 col-md-12">
                      <label>Size of ground water tank</label>
                      <input type="text" class="form-control" name="ground_water" >
                    </div>
                      <div class="form-group mb-3 col-md-12">
                        <label>There have any Functional Watermeter/ferrule</label>
                        <input type="text" class="form-control" name="func_water_meter" >
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
                        <input type="text" class="form-control" name="water_supply_time">
                      </div>
                      <div class="form-group mb-3 col-md-12">
                        <label>Approx consumption (All Users) in Ltr.</label>
                        <input type="text" class="form-control" name="consumption">
                      </div>
                      <div class="form-group mb-3 col-md-12">
                        <label>Any complain lodge to ULBs' on Drinking Water supply?</label>
                        <input type="text" class="form-control" name="complain">
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
                    
                    <button type="submit" class="btn btn-primary" {{isset($readonly) ? $readonly : ''}}>Submit</button>
                   
                </form>           
            </div>
        </div>
    </div>
</div>


@stop

