@extends('backend.layouts.default')
@section('page_title', 'amrut_dw_ward_wise_data')
@section('content')

{{-- commercial setup survey --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">AMRUT DW WARD WISE DATA
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
                    <div class="mb-3">
                        <label class="form-label">No. of House Hold:</label>
                        <input type="text" class="form-control"  name="swmci_no_house_hold" >
                    </div>


                    <div class="mb-3">
                        <label class="form-label">No. of slum:</label>
                        <input type="text" class="form-control"  name="swmci_no_slum" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. Of Apartment :</label>
                        <input type="text" class="form-control"  name="swmci_no_apartment" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. Of Society/Housing complex:</label>
                        <input type="text" class="form-control"  name="swmci_no_socity_houseingcomplex" >
                    </div>

                    
                    <div class="mb-3">
                        <label class="form-label">No. of Market (Traditional).</label>
                        <input type="text" class="form-control"  name="swmci_no_market_traditional">
                    </div>
 
 
 
					<div class="mb-3">
                        <label class="form-label">No. of Shops:</label>
                        <input type="text" class="form-control"  name="swmci_no_shop_trad" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. of Market (Shopping mall):</label>
                        <input type="text" class="form-control"  name="swmci_no_market_shopping_mall" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. of Shops:</label>
                        <input type="text" class="form-control"  name="swmci_no_shop_mall" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. of Unorganized shops:</label>
                        <input type="text" class="form-control"  name="swmci_no_unorganized_shop" >
                    </div>


                    <div class="mb-3">
                        <label class="form-label">No. Of ICDS:</label>
                        <input type="text" class="form-control"  name="swmci_no_icds" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. of students:</label>
                        <input type="text" class="form-control"  name="swmci_no_student_icds" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. Of Pry. School/SSK:</label>
                        <input type="text" class="form-control"  name="swmci_no_primary_school_ssk" >
                    </div>

                   
                    <div class="mb-3">
                        <label class="form-label">No. of students:</label>
                        <input type="text" class="form-control"  name="swmci_no_student_school_ssk">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. Of Upper Pry. School.</label>
                        <input type="text" class="form-control"  name="swmci_no_upper_primary_school">
                    </div>
 
					<div class="mb-3">
                        <label class="form-label">No. of students:</label>
                        <input type="text" class="form-control"  name="swmci_no_student_upper_primary_school" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. Of College:</label>
                        <input type="text" class="form-control"  name="swmci_no_college" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. of students:</label>
                        <input type="text" class="form-control"  name="swmci_no_student_college" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. Of Other Educational Institute:</label>
                        <input type="text" class="form-control"  name="swmci_no_other_educational_institute" >
                    </div>


                    <div class="mb-3">
                        <label class="form-label">No. of students:</label>
                        <input type="text" class="form-control"  name="swmci_no_student_other_institute" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. Of Govt. Office:</label>
                        <input type="text" class="form-control"  name="swmci_no_govt_office" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. of officers/employee/staffs:</label>
                        <input type="text" class="form-control"  name="swmci_no_employee" >
                    </div>

                   
                    <div class="mb-3">
                        <label class="form-label">No. Of Students Hostel:</label>
                        <input type="text" class="form-control"  name="swmci_no_student_hostel">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. of students.</label>
                        <input type="text" class="form-control"  name="swmci_no_student_in_hostel">
                    </div>
 
					<div class="mb-3">
                        <label class="form-label">No. Of Other Hostel/Mess:</label>
                        <input type="text" class="form-control"  name="swmci_no_other_hostel" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. of resident:</label>
                        <input type="text" class="form-control"  name="swmci_no_resident" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. Of Bus Stand:</label>
                        <input type="text" class="form-control"  name="swmci_no_bus_stand" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. Of Rly. Station:</label>
                        <input type="text" class="form-control"  name="swmci_no_rly_station" >
                    </div>


                    <div class="mb-3">
                        <label class="form-label">No. Of Airport:</label>
                        <input type="text" class="form-control"  name="swmci_no_airport" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. Of River ghat:</label>
                        <input type="text" class="form-control"  name="swmci_no_river_ghar" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. Of crematorium:</label>
                        <input type="text" class="form-control"  name="swmci_no_crematorium" >
                    </div> 
					<div class="mb-3">
                        <label class="form-label">No. Of graveyard.</label>
                        <input type="text" class="form-control"  name="swmci_no_graveyard">
                    </div>
 
					<div class="mb-3">
                        <label class="form-label">No. Of Community Hall:</label>
                        <input type="text" class="form-control"  name="swmci_no_community_hall" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. Of Cinema Hall:</label>
                        <input type="text" class="form-control"  name="swmci_no_cinema_hall" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. Of Restaurant:</label>
                        <input type="text" class="form-control"  name="swmci_no_resturent" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. Of residential Hotels:</label>
                        <input type="text" class="form-control"  name="swmci_no_residential_hotel" >
                    </div>


                    <div class="mb-3">
                        <label class="form-label">No. of RWH (Rain Water Harvesting) unit:</label>
                        <input type="text" class="form-control"  name="swmci_no_rwh_unit" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. of Water tank/Pond/Water Body:</label>
                        <input type="text" class="form-control"  name="swmci_no_water_tank_pond_water_body" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. Of Tube Well (hand Pump):</label>
                        <input type="text" class="form-control"  name="swmci_no_hand_pump" >
                    </div>

                   
                    <div class="mb-3">
                        <label class="form-label">No. Of Tap (Stand post for DW):</label>
                        <input type="text" class="form-control"  name="swmci_no_tap">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. of House connection for DW pipeline.</label>
                        <input type="text" class="form-control"  name="swmci_no_conn_for_dw_pipeline">
                    </div>
 
 
 
					<div class="mb-3">
                        <label class="form-label">No. of DW connection with water meter :</label>
                        <input type="text" class="form-control"  name="swmci_no_connection_water_meter" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. of DW connection with water meter (NF):</label>
                        <input type="text" class="form-control"  name="swmci_no_connection_water_meter_nf" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. Of Water Pump:</label>
                        <input type="text" class="form-control"  name="swmci_no_water_pump" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Total Hour for water supply per day:</label>
                        <input type="text" class="form-control"  name="swmci_total_hour_water_supply_per_day" >
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Total length of drain (in Mtr):</label>
                        <input type="text" class="form-control"  name="swmci_total_drain_length" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. of STP/Other waste water treatment unit:</label>
                        <input type="text" class="form-control"  name="swmci_no_stp_other_waste_tret_unit" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. of House without toilet:</label>
                        <input type="text" class="form-control"  name="swmci_no_without_toilet_house" >
                    </div>

                   
                    <div class="mb-3">
                        <label class="form-label">No. of septic tank:</label>
                        <input type="text" class="form-control"  name="swmci_no_septic_tank">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. of septic tank without sock pit.</label>
                        <input type="text" class="form-control"  name="swmci_no_septic_tank_with_out_sock_pit">
                    </div>
  
					<div class="mb-3">
                        <label class="form-label">Other information.</label>
                        <input type="text" class="form-control"  name="swmci_other">
                    </div>
                    
                    <button type="submit" class="btn btn-primary" {{(isset($readonly)) ? $readonly : ''}}>Submit</button>
                   
                </form>              
            </div>
        </div>
    </div>
</div>


@stop

