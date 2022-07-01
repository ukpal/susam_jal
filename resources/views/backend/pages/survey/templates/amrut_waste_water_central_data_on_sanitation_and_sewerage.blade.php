@extends('backend.layouts.default')
@section('page_title', 'amrut_waste_water_central_data_on_sanitation_and_sewerage')
@section('content')

{{-- commercial setup survey --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">AMRUT-Waste Water Management-Format 11 [Annexure-E] <br>
                    (Central Data on sanitation and Sewerage)                    
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
                      <hr>

                      <h3>COVERAGE OF TOILETS %</h3>
                      <h4>Sanitation Coverage</h4>

                      <div class="form-group mb-3">
                        <label>Total Number of Properties in the City (Sanitation)</label>
                        <input type="number" class="form-control" name="total_properties_in_city_sanitation"> 
                      </div>

                      <div class="form-group mb-3">
                        <label>Properties with toilets</label>
                        <input type="number" class="form-control" name="properties_with_toilets"> 
                      </div>

                      <div class="form-group mb-3">
                        <label>Households dependent on functional community toilets</label>
                        <input type="number" class="form-control" name="dependent_on_community_toilets"> 
                      </div>

                      <div class="form-group mb-3">
                        <label>Total Number of Properties with access to toilets</label>
                        <input type="number" class="form-control" name="properties_with_access_to_toilets"> 
                      </div>

                      <hr>
                      <h3>COVERAGE OF SEWAGE NETWORK SERVICES %</h3>

                      <div class="form-group mb-3">
                        <label>Total Number of Properties in the City (sewage)</label>
                        <input type="number" class="form-control" name="total_properties_in_city_sewage"> 
                      </div>

                      <div class="form-group mb-3">
                        <label>Properties with sewer connections</label>
                        <input type="number" class="form-control" name="properties_with_sewer_connections"> 
                      </div>

                      <div class="form-group mb-3">
                        <label>Properties with onsite sanitary disposal</label>
                        <input type="number" class="form-control" name="properties_with_onsite_sanitary_disposal"> 
                      </div>

                      <hr>
                      <h3>COLLECTION EFFICIENCY OF SEWAGE NETWORK %</h3>
                      <h4>Waste Water Production - Volume of Water Consumed and Waste Water Generated</h4>

                      <div class="form-group mb-3">
                        <label>Volume of water consumed and billed from Domestic Connections (In MLD)</label>
                        <input type="number" class="form-control" name="domestic_water_consumed"> 
                      </div>

                      <div class="form-group mb-3">
                        <label>Volume of water consumed and billed from Bulk supply – Apartments (In MLD)</label>
                        <input type="number" class="form-control" name="apartments_water_consumed"> 
                      </div>

                      <div class="form-group mb-3">
                        <label>Volume of water consumed and billed from Bulk supply - Layouts/Societies (In MLD)</label>
                        <input type="number" class="form-control" name="societies_water_consumed"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Volume of water consumed and billed from Non domestic Connections (In MLD)</label>
                        <input type="number" class="form-control" name="non_domestic_water_consumed"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Volume of water consumed (both billed and unbilled) from Public taps (In MLD)</label>
                        <input type="number" class="form-control" name="public_taps_water_consumed"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Volume of water from free supplies (other connections) - (In MLD)</label>
                        <input type="number" class="form-control" name="water_from_free_supplies"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Volume of water consumed and billed from any other ULB sources (In MLD)</label>
                        <input type="number" class="form-control" name="other_ulb_sources_water_consumed"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Volume of water consumed from any Non ULB water sources (In MLD)</label>
                        <input type="number" class="form-control" name="non_ulb_water_consumed"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Total Water Consumption (billed and unbilled) from ULB and Non ULB sources) (In MLD)</label>
                        <input type="number" class="form-control" name="total_water_consumption_from_ulb_n_non_ulb"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Volume of waste water generated from Domestic Water Consumption (In MLD)</label>
                        <input type="number" class="form-control" name="domestic_waste_water"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Volume of waste water generated from Bulk Supply – Apartments (In MLD)</label>
                        <input type="number" class="form-control" name="apartments_waste_water"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Volume of waste water generated from Bulk Supply - Layouts/Societies (In MLD)</label>
                        <input type="number" class="form-control" name="societies_waste_water"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Volume of waste water generated from Non Domestic Water Consumption (In MLD)</label>
                        <input type="number" class="form-control" name="non_domestic_waste_water"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Volume of waste water generated from Public Tap Water Consumption (In MLD)</label>
                        <input type="number" class="form-control" name="public_taps_waste_water"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Volume of waste water generated from free supplies (other connections) (In MLD)</label>
                        <input type="number" class="form-control" name="waste_water_from_free_supplies"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Volume of waste water generated from other ULB source water consumption (In MLD)</label>
                        <input type="number" class="form-control" name="waste_water_from_ulb_source"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Volume of waste water generated from Non ULB source Water consumption (In MLD) </label>
                        <input type="number" class="form-control" name="waste_water_from_non_ulb_source"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Total Waste Water Generated (In MLD)</label>
                        <input type="number" class="form-control" name="total_waste_water_generated"> 
                      </div>
                      <h4>Waste Water Collection and Treatment</h4>
                      <div class="form-group mb-3">
                        <label>Volume of sewage actually treated at the Primary Treatment Plant (In MLD)</label>
                        <input type="number" class="form-control" name="primary_plant_sewage"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Volume of sewage actually treated at Secondary Treatment Plant (In MLD)</label>
                        <input type="number" class="form-control" name="secondary_plant_sewage"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Total Volume of Waste Water collected and Treated at Sewage Treatment Plants (In MLD)</label>
                        <input type="number" class="form-control" name="total_water_at_sewage_treatment_plant"> 
                      </div>

                      <hr>
                      <h3>ADEQUACY OF SEWAGE TREATMENT CAPACITY %</h3>
                      <div class="form-group mb-3">
                        <label>Installed Capacity of Primary Treatment Plant (In MLD)</label>
                        <input type="number" class="form-control" name="primary_plant_capacity"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Installed Capacity of Secondary Treatment Plant (In MLD)</label>
                        <input type="number" class="form-control" name="seconadry_plant_capacity"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Total Installed Capacity (Primary/Secondary Treatment) (In MLD)</label>
                        <input type="number" class="form-control" name="total_installed_capacity"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Total Waste Water Generated (In MLD)</label>
                        <input type="number" class="form-control" name="total_waste_water_generated_at_sewage_plant"> 
                      </div>

                      <hr>
                      <h3>EXTENT OF REUSE AND RECYCLING OF SEWAGE %</h3>
                      <div class="form-group mb-3">
                        <label>Volume of sewage actually treated at Secondary Treatment Plant (In MLD)</label>
                        <input type="number" class="form-control" name="secondary_plant_sewage_volume"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Volume of treated waste water reused after Secondary Treatment (In MLD)</label>
                        <input type="number" class="form-control" name="waste_water_reused_after_secondary_treatment"> 
                      </div>

                      <hr>
                      <h3>QUALITY OF SEWAGE TREATMENT %</h3>
                      <h4>Discharge Compliance after Secondary Treatment of Sewage</h4>
                      <div class="form-group mb-3">
                        <label>Number of Treated Effluent Samples Tested in a year</label>
                        <input type="number" class="form-control" name="effluent_samples_tasted"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Number of Treated Effluent Samples Passed in a year</label>
                        <input type="number" class="form-control" name="effluent_samples_passed"> 
                      </div>

                      <hr>
                      <h3>EFFICIENCY IN REDRESSAL OF CUSTOMER COMPLAINTS %</h3>
                      <h4>Consumer Services</h4>
                      <div class="form-group mb-3">
                        <label>Sewage related Complaints received during the year</label>
                        <input type="number" class="form-control" name="sewage_complaints_received"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Sewage related Complaints resolved within 24 hours during the year</label>
                        <input type="number" class="form-control" name="sewage_complaints_resolved"> 
                      </div>

                      <hr>
                      <h3>EXTENT OF COST RECOVERY IN SEWAGE MANAGEMENT</h3>
                      <h4>Financial Information - Annual Operating Expenses</h4>
                      <div class="form-group mb-3">
                        <label>Regular Staff and Administration</label>
                        <input type="number" class="form-control" name="regular_staff"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Outsourced /Contract Staff Costs</label>
                        <input type="number" class="form-control" name="contract_staff_costs"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Electricity Charges /Fuel Costs</label>
                        <input type="number" class="form-control" name="fuel_costs"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Chemicals Costs</label>
                        <input type="number" class="form-control" name="chemical_costs"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Repairs/Maintenance Costs</label>
                        <input type="number" class="form-control" name="maintenance_costs"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Contractor Costs for O&M</label>
                        <input type="number" class="form-control" name="contractor_costs"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Others (Specify)</label>
                        <input type="number" class="form-control" name="others"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Total Annual Operating Expenses</label>
                        <input type="number" class="form-control" name="total_annual_operating_expenses"> 
                      </div>
                      <h4>Financial Information - Annual Operating Revenues</h4>
                      <div class="form-group mb-3">
                        <label>Arrears at the beginning of current year</label>
                        <input type="number" class="form-control" name="beginning_year_arrears"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Revenue demand from user charges - sewerage only</label>
                        <input type="number" class="form-control" name="revenue_from_users"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Revenue demand from tax/cess - sewerage only</label>
                        <input type="number" class="form-control" name="revenue_from_tax"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Revenue demand from other sources (eg. connection costs/septage emptying charges/donations etc.)</label>
                        <input type="number" class="form-control" name="revenue_from_other_sources"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Total Revenue Demand of current year</label>
                        <input type="number" class="form-control" name="total_revenue_of_current_year"> 
                      </div>

                      <hr>
                      <h3>EFFICIENCY IN COLLECTION OF SEWAGE CHARGES</h3>
                      <div class="form-group mb-3">
                        <label>Total Revenue Demand of current year</label>
                        <input type="number" class="form-control" name="total_revenue_of_sewage_collection"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Collection against arrears</label>
                        <input type="number" class="form-control" name="collection_against_arrears"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Collection against current demand</label>
                        <input type="number" class="form-control" name="collection_against_current_demand"> 
                      </div>

                      <hr>
                      <h3>Septage Management</h3>
                      <div class="form-group mb-3">
                        <label>Does the ULB practice septage management</label>
                        <select class="form-control" name="septage_management_of_ulb" >
                            <option value="">Select</option>
                            <option value="yes">YES</option>
                            <option value="no">NO</option>
                        </select>
                      </div>
                      <div class="form-group mb-3">
                        <label>Septage sucking machines available within ULB</label>
                        <input type="number" class="form-control" name="septage_machines_within_ulb"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Private Septage machines licenced by ULB</label>
                        <input type="number" class="form-control" name="private_septage_machines_licenced_by_ulb"> 
                      </div>

                      <hr>
                      <h3>Connection Costs for Sewerage Connections</h3>
                      <div class="form-group mb-3">
                        <label>Residential - General</label>
                        <input type="number" class="form-control" name="sewerage_connection_costs_for_general"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Residential - Urban Poor</label>
                        <input type="number" class="form-control" name="sewerage_connection_costs_for_urban_poor"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Institutional</label>
                        <input type="number" class="form-control" name="sewerage_connection_costs_for_institutional"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Commercial</label>
                        <input type="number" class="form-control" name="sewerage_connection_costs_for_commercial"> 
                      </div>
                      <div class="form-group mb-3">
                        <label>Industrial</label>
                        <input type="number" class="form-control" name="sewerage_connection_costs_for_industrial"> 
                      </div>                    
                    
                      <button type="submit" class="btn btn-primary" {{(isset($readonly)) ? $readonly : ''}}>Submit</button>
                   
                </form>              
            </div>
        </div>
    </div>
</div>


@stop

