@extends('backend.layouts.default')
@section('page_title', 'Dashboard')
@section('content')
{{-- <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script> --}}

{{-- House Hold Survey --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">New Survey Response
                    <a href="{{url('survey-responses/'.encrypt($survey_id).'/template/'.encrypt($template_id))}}" class="float-end btn btn-secondary">Back</a>
                </h5>
            </div>
            
            <div class="card-body">
                <form action="{{url('new-survey-response')}}" id="form" name="myForm" method="post" enctype="multipart/form-data" >
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Ward no.:</label>
                        <input type="text" class="form-control" name="ward_no">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Head of the family name*:</label>
                        <input type="text" class="form-control" name="head_of_family" required>
                    </div>

                    <div class="my-3">
                        <div class="row">
                            <div class="col text-center">
                                <label class="form-check form-check-inline me-5">
                                    <input class="form-check-input" type="radio" name="care_of_radio" checked value="father_name">
                                    <span class="form-check-label"> Fathers' name</span>
                                </label>
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="care_of_radio" value="husband_name">
                                    <span class="form-check-label">Husbands' name</span>
                                </label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="forh" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contact Number:</label>
                        <input type="text" class="form-control" name="contact_number">
                    </div>                   

                    <div class="mb-3">
                        <label  class="form-label">Nature of resident*:</label>
                        <select class="form-select" name="nature_of_resident" required>
                            <option selected value="">--- select ---</option>
                          @foreach (natureOfResident() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Holding Number:</label>
                        <input type="text" class="form-control" name="holding_number">
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Permanent resident*:</label>
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
                        <label class="form-label">No. of family members*:</label>
                        <input type="text" class="form-control" name="family_members" required>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Only Old Age Family*:</label>
                        <select class="form-select" name="old_age_family" required>
                            <option selected value="">--- select ---</option>
                          @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">No. of members (Age between 59 to 20): </label>
                        <select class="form-select" name="members_59_to_20">
                            <option selected value="">--- select ---</option>
                            @for ($i = 0; $i < 10; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                            @endfor
                            <option value="10+">10+</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">No. of members (Age between 19 to 20): </label>
                        <select class="form-select" name="members_19_to_20">
                            <option selected value="">--- select ---</option>
                            @for ($i = 0; $i < 10; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                            @endfor
                            <option value="10+">10+</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">No. of members (Age below 10): </label>
                        <select class="form-select" name="members_below_10">
                            <option selected value="">--- select ---</option>
                            @for ($i = 0; $i < 10; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                            @endfor
                            <option value="10+">10+</option>
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
                        <label  class="form-label">Building category*: </label>
                        <select class="form-select" name="building_category" required>
                            <option selected value="">--- select ---</option>
                            @foreach (buildingCategory() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Toilet type (highly uses)*: </label>
                        <select class="form-select" name="toilet_type" required>
                            <option selected value="">--- select ---</option>
                            @foreach (toiletType() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">If, has any septic tank in HHL, Last year of cleaning*:</label>
                        <input type="date" class="form-control" name="septic_tank_cleaning_year" required>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">If there have septic tank with sock pit*:</label>
                        <select class="form-select" name="septic_tank_with_sock_pit" required>
                            <option selected value="">--- select ---</option>
                          @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Water connection to HH*:</label>
                        <select class="form-select" name="water_connection" required>
                            <option selected value="">--- select ---</option>
                          @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                          @endforeach
                          <option value="required">Required</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Member of bulk waste generator (BWG)*: </label>
                        <select class="form-select" name="bulk_waste_generator" required>
                            <option selected value="">--- select ---</option>
                          @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Waste bin received from Municipality, Corporation, NAA*: </label>
                        <select class="form-select" name="waster_bin_received" required>
                            <option selected value="">--- select ---</option>
                          @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Best time for waste collection*:</label>
                        <input type="time" class="form-control" name="waste_collection_time" required>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Present waste collection system is in there?* </label>
                        <select class="form-select" name="present_waste_collection" required>
                            <option selected value="">--- select ---</option>
                          @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Approx Bio-Degradable (Wet) waste generation*:</label>
                        <input type="number" class="form-control" placeholder="in Kg." pattern="^[0-9]*" name="wet_waste_generation" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Approx Bio-Degradable (Dry) waste generation*:</label>
                        <input type="number" class="form-control" placeholder="in Kg." pattern="^[0-9]*" name="dry_waste_generation" required>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Any scope of bio-medical waste generation?* </label>
                        <select class="form-select" name="bio_medical_waste_scope" required>
                            <option selected value="">--- select ---</option>
                          @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Residence with commercial/office setup*: </label>
                        <select class="form-select" name="residence_of_commercial" required>
                            <option selected value="">--- select ---</option>
                          @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Orient on municipal waste collection system?*: </label>
                        <select class="form-select" name="orient_on_municipal_waste_collection" required>
                            <option selected value="">--- select ---</option>
                          @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Orient on source segregation?*: </label>
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
                        <label class="form-label">Other Comments:</label>
                        <textarea name="other_comments" class="form-control" cols="30" rows="5"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Upload Signature:</label>
                        <input type="file" class="form-control" name="signature" accept=".png, .jpeg, .pdf">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Upload Other file:</label>
                        <input type="file" class="form-control" name="other_file" accept=".png, .jpeg, .pdf">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Latitude:</label>
                        <input type="text" readonly class="form-control" id="lat" name="latitude">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Longitude:</label>
                        <input type="text" readonly class="form-control" id="long" name="longitude">
                    </div>
                    <input type="hidden" required name="survey_response_time" id="response_time">
                    <input type="hidden" required name="user_id" value="{{session()->get('loggedUser')->user_id}}">
                    <input type="hidden" required name="survey_id" value="{{$survey_id}}">
                    <input type="hidden" required name="template_id" value="{{$template_id}}">
                    <input type="hidden" name="template_name" value="{{$template_name}}">
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{url('survey-responses/'.encrypt($survey_id).'/template/'.encrypt($template_id))}}" class="btn btn-secondary">Cancel</a>
                  </form>
                
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    function initGeolocation()
    {
       if( navigator.geolocation )
       {
          // Call getCurrentPosition with success and failure callbacks
          navigator.geolocation.getCurrentPosition( success, fail );
       }
       else
       {
          alert("Sorry, your browser does not support geolocation services.");
       }
    }

    function success(position)
    {

        document.getElementById('long').value = position.coords.longitude;
        document.getElementById('lat').value = position.coords.latitude
    }

    function fail()
    {
       // Could not obtain location
    }

    function getCurrentDateTime(){
        var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        document.getElementById('response_time').value=date+' '+time;
    }
    initGeolocation();
    getCurrentDateTime();
    function validate(){
        if( document.myForm.head_of_family.value == "" ) {
            document.myForm.head_of_family.classList.add("is-invalid");
            return false;
        }else{
            document.myForm.head_of_family.classList.remove("is-invalid");
        }
        if( document.myForm.nature_of_resident.value == "" ) {
            document.myForm.nature_of_resident.classList.add("is-invalid");
            return false;
        }else{
            document.myForm.nature_of_resident.classList.remove("is-invalid");
        }
        if( document.myForm.permanent_resident.value == "" ) {
            document.myForm.permanent_resident.classList.add("is-invalid");
            return false;
        }else{
            document.myForm.permanent_resident.classList.remove("is-invalid");
        }
        if( document.myForm.building_category.value == "" ) {
            document.myForm.building_category.classList.add("is-invalid");
            return false;
        }else{
            document.myForm.building_category.classList.remove("is-invalid");
        }

    }
    document.querySelector("#form").addEventListener("submit", function(e) {
       
        e.preventDefault();
        swal({
        title: "Are you sure?",
        text: "Once submitted, you will not be able to change this data!",
        icon: "warning",
        buttons: ["Cancel", "Submit"],
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            document.querySelector("#form").submit()
        } else {
            return false;
        }
        });
    });
</script>  

@stop

@section('scripts')
    <script>
        $('#forh').keyup(function(){
            var radio=$("input[name='care_of_radio']:checked").val();
            $("#forh").attr('name',radio);
        })
        $("input[name='care_of_radio']").change(function(){
            var radio=$("input[name='care_of_radio']:checked").val();
            $("#forh").attr('name',radio);
        })
    </script>
@endsection

