@extends('backend.layouts.default')
@section('page_title', 'amrut_rwh_central_data_on_rain_water_harvesting')
@section('content')

{{-- commercial setup survey --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">AMRUT RWH CENTRAL DATA ON RAIN WATER HARVESTING
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
                        <label>District</label>
                        <input type="text" class="form-control" name="district" value="{{$survey_details->district}}" readonly>
                        
                      </div>
                      <div class="form-group mb-3">
                        <label>Sub Division</label>
                        <input type="text" class="form-control" name="sub_division" value="{{$survey_details->subd}}" readonly> 
                        
                      </div>
                      <div class="form-group mb-3">
                        <label>ULBs'</label>
                        <input type="text" class="form-control" name="ulb_name" value="{{$survey_details->ulb}}" readonly> 
                      </div>
                      <div class="form-group mb-3">
                        <label>No. of existing unit of RAINWATER HARVESTING</label>
                        <input type="number" class="form-control" name="num_exist_unit_rainwater_harverst">
                      </div>
                      <div class="form-group mb-3">
                        <label>Coverage of rainwater harvesting structure'(%)</label>
                        <input type="number" class="form-control" name="cov_rainwater_harvest_structure"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Total number of properties with RWH structure</label>
                        <input type="number" class="form-control" name="num_prop_rwh_structure"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Does city government completed any RWH project in current financial year?</label>
                        <select class="form-control" name="city_gov_completed_rwh_project" >
                          <option value="">Select</option>
                          <option value="yes">YES</option>
                          <option value="no">NO</option>
                        </select>
                      </div>
                      <!-- onchange="if($(this).val()=='yes'){$('#num_rwh_proj_completed_fin_year').show()}else{$('#num_rwh_proj_completed_fin_year').hide()}" -->
                      <div class="form-group mb-3">
                        <label>If yes, then number of RWH project completed in this financial year</label>
                        <input type="number" class="form-control" name="num_rwh_proj_completed_fin_year" id="num_rwh_proj_completed_fin_year"> 
                      </div>
              
                      <div class="form-group mb-3">
                        <label>Does ULB link rainwater harvesting (RWH) structure data with property database?</label>
                        <select class="form-control" name="is_ulb_link_rwh_structure_data_with_prop_db">
                          <option value="">Select</option>
                          <option value="yes">YES</option>
                          <option value="no">NO</option>
                        </select>
                      </div>
              
                      <div class="form-group mb-3">
                        <label>Does ULB check functionality of RWH structure?</label>
                        <select class="form-control" name="is_ulb_check_funct_rwh_structure">
                          <option value="">Select</option>
                          <option value="yes">YES</option>
                          <option value="no">NO</option>
                        </select>
                      </div>
              
                      <div class="form-group mb-3">
                        <label>If yes, Number of non-functional RWH structures</label>
                        <input type="number" class="form-control" name="num_non_func_rwh_structures"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Information collection on the uses of the harvested rainwater by the stakeholders may be added for more precise information collection.</label>
                        <input type="text" class="form-control" name="info_rainwater_stakeholders"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>There have any By-Law on RWH</label>
                        <input type="text" class="form-control" name="thr_hv_any_by_Law_rwh"> 
                      </div>
                    
                      <button type="submit" class="btn btn-primary" {{(isset($readonly)) ? $readonly : ''}}>Submit</button>
                   
                </form>              
            </div>
        </div>
    </div>
</div>


@stop

