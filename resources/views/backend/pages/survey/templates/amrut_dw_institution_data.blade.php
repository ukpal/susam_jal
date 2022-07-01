@extends('backend.layouts.default')
@section('page_title', 'amrut_dw_institution_data')
@section('content')

{{-- commercial setup survey --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">AMRUT DW INSTITUTION DATA
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
                    <div class="mb-3">
                        <label class="form-label">Ward No:</label>
                        <input type="text" class="form-control"  name="ward_no" >
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Habitation Name:</label>
                        <input type="text" class="form-control"  name="si_habitation_name" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Location:</label>
                        <input type="text" class="form-control"  name="si_location" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Name of the Institution:</label>
                        <input type="text" class="form-control"  name="si_institute_name" >
                    </div>

                   
                    <div class="mb-3">
                        <label class="form-label">Head/Caretaker/Agency Head of Staffs name:</label>
                        <input type="text" class="form-control"  name="si_stuff_head">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contact No.</label>
                        <input type="text" class="form-control"  name="si_contact_no">
                    </div>
 

                    <div class="mb-3">
                        <label class="form-label">User Type :</label>
						
						<select class="form-select" name="si_user_type" >
                            <option selected value="null">--- select ---</option>                           
                            <option  value="SINGLE">Single</option>                           
                            <option  value="MULTY">Multy</option> 
														
                        </select>
						
                       
                    </div>
					 
                    <div class="mb-3">
                        <label class="form-label">Number of water users:</label>
                        <input type="text" class="form-control"  name="si_water_user_no">
                    </div>
					 
                    <div class="mb-3">
                        <label class="form-label">Type of Drinking water source:</label>
                        <input type="text" class="form-control"  name="si_drinking_water_source_type">
                    </div>
					
					
					
					
					
					
					
					 <div class="mb-3">
                        <label class="form-label">There have any Bulk Water Connection by ULBs':</label>
                        <input type="text" class="form-control"  name="si_ulb_bulk_water_connection" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Size of ground water tank (Cubic Mtr):</label>
                        <input type="text" class="form-control"  name="si_ground_water_tank_size" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">There have any Functional Watermeter/ferrule:</label>
						<select class="form-select" name="si_functional_watermeter_ferrule" >
                            <option selected value="null">--- select ---</option>                           
                            <option  value="YES">Yes</option>                           
                            <option  value="NO">No</option> 
							<option  value="N/A">N/A</option> 							
                        </select>
						
                        
                    </div>

                    <div class="mb-3">
                        <label class="form-label">There have any Non Functional Watermeter/ferrule:</label>
						<select class="form-select" name="si_non_functional_watermeter_ferrule" >
                            <option selected value="null">--- select ---</option>                           
                            <option  value="YES">Yes</option>                           
                            <option  value="NO">No</option> 
							<option  value="N/A">N/A</option> 							
                        </select>
						
                        
                    </div>


                    <div class="mb-3">
                        <label class="form-label">There have any unmeter:</label>
						<select class="form-select" name="si_unmeter" >
                            <option selected value="null">--- select ---</option>                           
                            <option  value="YES">Yes</option>                           
                            <option  value="NO">No</option> 
							<option  value="N/A">N/A</option> 							
                        </select>
                         
                        
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Total time of water supply (All slots):</label>
                        <input type="text" class="form-control"  name="si_total_water_supply_time" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Approx consumption (All Users) in Ltr.:</label>
                        <input type="text" class="form-control"  name="si_all_user_approx_consumption" >
                    </div>

                   
                     
                    <div class="mb-3">
                        <label class="form-label">Any complain lodge to ULBs' on Drinking Water supply?</label>
                        <input type="text" class="form-control"  name="si_drinking_water_ulb_complain">
                    </div>
 

                    <div class="mb-3">
                        <label class="form-label">Type of problem :</label>
                        <input type="text" class="form-control"  name="si_problem_type">
                    </div>
					 
                    <div class="mb-3">
                        <label class="form-label">It was resolved?:</label>
						<select class="form-select" name="si_is_resolved" >
                            <option selected value="null">--- select ---</option>                           
                            <option  value="YES">Yes</option>                           
                            <option  value="NO">No</option> 
							<option  value="N/A">N/A</option> 							
                        </select>
                         
                    </div>
					 
                    <div class="mb-3">
                        <label class="form-label">If yes, How much time of resolve that issue:</label>
                        <input type="text" class="form-control"  name="si_resolve_time">
                    </div>
                    
                    <button type="submit" class="btn btn-primary" {{(isset($readonly)) ? $readonly : ''}}>Submit</button>
                   
                </form>              
            </div>
        </div>
    </div>
</div>


@stop

