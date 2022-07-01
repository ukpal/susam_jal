@extends('backend.layouts.default')
@section('page_title', 'mswm_survey_for_house_hold')
@section('content')

{{-- commercial setup survey --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">MSWM Survey Format on House Hold Data
                    @if (session()->get('loggedUser')->role=='surveyor')
                    <a href="{{url('my-survey/')}}" class="float-end btn btn-secondary">Back</a>
                    @else
                    <a href="{{url('survey-types/')}}" class="float-end btn btn-secondary">Back</a>
                    @endif
                    
                </h5>
            </div>
            
            <div class="card-body">
                <form method="POST" action="{{url('new-survey-response')}}" class="needs-validation" novalidate>
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
                      <label>Ward No. <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="ward_no" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Head of the family name <span class="text-danger">*</span>:</label>
                        <input type="text" class="form-control" name="head_of_family" required>
                    </div>                  
                    <div class="mb-3">
                        <label class="form-label">Father's name <span class="text-danger">*</span>:</label>
                        <input type="text" class="form-control" name="father_name" required>
                    </div>                  
                    <div class="mb-3">
                        <label class="form-label">Husband's name <span class="text-danger">*</span>:</label>
                        <input type="text" class="form-control" name="husband_name" required>
                    </div>                  

                    <div class="mb-3">
                        <label class="form-label">Contact Number:</label>
                        <input type="text" class="form-control" name="contact_number">
                    </div>                   

                    <div class="mb-3">
                        <label  class="form-label">Nature of resident <span class="text-danger">*</span>:</label>
                        <select class="form-select" name="nature_of_resident" required>
                            <option selected value="">--- select ---</option>
                          @foreach (natureOfResident() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Permanent resident <span class="text-danger">*</span>:</label>
                        <select class="form-select" name="permanent_resident" required>
                            <option selected value="">--- select ---</option>
                          @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Permanent resident in rented house:</label>
                        <select class="form-select" name="permanent_resident_rented">
                            <option selected value="">--- select ---</option>
                          @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Temporary resident in rented house:</label>
                        <select class="form-select" name="temporary_resident_rented">
                            <option selected value="">--- select ---</option>
                          @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Other Type Resident:</label>
                        <input type="text" class="form-control" name="other_type_resident">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. of family members <span class="text-danger">*</span>:</label>
                        <input type="text" class="form-control" name="family_members" required>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Only Old Age Family <span class="text-danger">*</span>:</label>
                        <select class="form-select" name="old_age_family" required>
                            <option selected value="">--- select ---</option>
                          @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">No. of female members (Age between 14 to 50): </label>
                        <select class="form-select" name="females_14_to_50">
                            <option selected value="">--- select ---</option>
                            @for ($i = 0; $i < 10; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                            @endfor
                            <option value="10+">10+</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">No. of Children (Age below 4yrs): </label>
                        <select class="form-select" name="children_below_4">
                            <option selected value="">--- select ---</option>
                            @for ($i = 0; $i < 10; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                            @endfor
                            <option value="10+">10+</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Building category <span class="text-danger">*</span>: </label>
                        <select class="form-select" name="building_category" required>
                            <option selected value="">--- select ---</option>
                            @foreach (buildingCategory() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Toilet type (highly uses) <span class="text-danger">*</span>: </label>
                        <select class="form-select" name="toilet_type" required>
                            <option selected value="">--- select ---</option>
                            @foreach (toiletType() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">If, has any septic tank in HHL, Last year of cleaning <span class="text-danger">*</span>:</label>
                        <input type="date" class="form-control" name="septic_tank_cleaning_year" required>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">If there have septic tank with sock pit <span class="text-danger">*</span>:</label>
                        <select class="form-select" name="septic_tank_with_sock_pit" required>
                            <option selected value="">--- select ---</option>
                          @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Water connection to HH <span class="text-danger">*</span>:</label>
                        <select class="form-select" name="water_connection" required>
                            <option selected value="">--- select ---</option>
                          @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                          @endforeach
                          <option value="required">Required</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Member of bulk waste generator (BWG) <span class="text-danger">*</span>: </label>
                        <select class="form-select" name="bulk_waste_generator" required>
                            <option selected value="">--- select ---</option>
                          @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Waste bin received from Municipality, Corporation, NAA <span class="text-danger">*</span>: </label>
                        <select class="form-select" name="waster_bin_received" required>
                            <option selected value="">--- select ---</option>
                          @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Best time for waste collection <span class="text-danger">*</span>:</label>
                        <input type="time" class="form-control" name="waste_collection_time" required>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Present waste collection system is in there? <span class="text-danger">*</span> </label>
                        <select class="form-select" name="present_waste_collection" required>
                            <option selected value="">--- select ---</option>
                          @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Approx Bio-Degradable (Wet) waste generation <span class="text-danger">*</span>:</label>
                        <input type="number" class="form-control" placeholder="in Kg." pattern="^[0-9]*" name="wet_waste_generation" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Approx Bio-Degradable (Dry) waste generation <span class="text-danger">*</span>:</label>
                        <input type="number" class="form-control" placeholder="in Kg." pattern="^[0-9]*" name="dry_waste_generation" required>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Any scope of bio-medical waste generation? <span class="text-danger">*</span> </label>
                        <select class="form-select" name="bio_medical_waste_scope" required>
                            <option selected value="">--- select ---</option>
                          @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Residence with commercial/office setup <span class="text-danger">*</span>: </label>
                        <select class="form-select" name="residence_of_commercial" required>
                            <option selected value="">--- select ---</option>
                          @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Orient on municipal waste collection system? <span class="text-danger">*</span>: </label>
                        <select class="form-select" name="orient_on_municipal_waste_collection" required>
                            <option selected value="">--- select ---</option>
                          @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Orient on source segregation? <span class="text-danger">*</span>: </label>
                        <select class="form-select" name="orient_on_source_segregation" required>
                            <option selected value="">--- select ---</option>
                          @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Name of assign “Nirmal Sathi” :</label>
                        <input type="text" class="form-control" name="name_of_assign">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Upload Signature:</label>
                        <input type="file" class="form-control" name="signature" accept=".png, .jpeg, .pdf">
                    </div>
                    
                    <button type="submit" class="btn btn-primary" {{(isset($readonly)) ? $readonly : ''}}>Submit</button>
                   
                </form>              
            </div>
        </div>
    </div>
</div>

<script>
    (function () {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.prototype.slice.call(forms)
        .forEach(function (form) {
          form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }

            form.classList.add('was-validated')
          }, false)
        })
    })()
</script>

@stop

