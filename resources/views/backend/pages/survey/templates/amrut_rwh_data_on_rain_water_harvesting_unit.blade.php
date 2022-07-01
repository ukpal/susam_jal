@extends('backend.layouts.default')
@section('page_title', 'amrut_rwh_data_on_rain_water_harvesting_unit')
@section('content')

{{-- commercial setup survey --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">AMRUT RWH DATA ON RAIN WATER HARVESTING UNIT
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
                    <label>Name of RWH unit (If Centrally)</label>
                    <input type="text" class="form-control" name="name_of_rwh_unit">
                    
                    </div>
                    <div class="form-group mb-3">
                    <label>Type of RWH unit</label>
                    <input type="text" class="form-control" name="type_of_rwh_unit">
                    
                    </div>
                    <div class="form-group mb-3">
                    <label>Owner of unit</label>
                    <input type="text" class="form-control" name="owner_of_unit_1">
                    </div>
                    
                    <div class="form-group mb-3">
                    <label>Functional?</label>
                    <select class="form-control" name="is_functional" >
                        <option selected value="">------Select--------</option>
                        <option value="yes">YES</option>
                        <option value="no">NO</option>
                    </select>
                    </div>
                    <!-- onchange="if($(this).val()=='yes'){$('#num_rwh_proj_completed_fin_year').show()}else{$('#num_rwh_proj_completed_fin_year').hide()}" -->
                    <div class="form-group mb-3">
                    <label>Technology/Method</label>
                    <input type="text" class="form-control" name="tech_or_method"> 
                    </div>
                    <div class="form-group mb-3">
                    <label>Storage Capacity (In Ltr.)</label>
                    <input type="number" class="form-control" name="storage_capacity">
                    </div>
                    <div class="form-group mb-3">
                    <label>Used for</label>
                    <select class="form-control" name="user_for">
                        <option selected value="">------Select--------</option>
                        <option value="Drinking">Drinking</option>
                        <option value="Other purpose">Other purpose</option>
                        <option value="NA">NA</option>
                    </select>
                    </div>
                    <div class="form-group mb-3">
                    <label>Owner of unit</label>
                    <select class="form-control" name="owner_of_unit">
                        <option selected value="">------Select--------</option>
                        <option value="Drinking">Individual</option>
                        <option value="Other purpose">Institution</option>
                        <option value="MuN">MuN</option>
                        <option value="Other">Other</option>
                    </select>
                    </div>
                    <div class="form-group mb-3">
                    <label>Is there any laboratory test report found?</label>
                    <select class="form-control" name="is_any_lab_test_report_found" >
                        <option selected value="">------Select--------</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                        <option value="NA">NA</option>
                    </select>
                    </div>
                    <div class="form-group mb-3">
                    <label>Any plan for extension?</label>
                    <select class="form-control" name="any_plan_for_extension" >
                        <option selected value="">------Select--------</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                        <option value="NA">NA</option>
                    </select>
                    </div>

                    <button type="submit" class="btn btn-primary" {{(isset($readonly)) ? $readonly : ''}}>Submit</button>
                   
                </form>              
            </div>
        </div>
    </div>
</div>


@stop

