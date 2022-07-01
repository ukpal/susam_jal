@extends('backend.layouts.default')
@section('page_title', 'Dashboard')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">New Survey Response
                    <a href="{{url('survey-responses/'.encrypt($response->survey_id).'/template/'.encrypt($response->template_id))}}" class="float-end btn btn-secondary">Back</a>
                </h5>
            </div>
            
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" name="myForm">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Head of the family name:</label>
                        <input type="text" readonly class="form-control" name="head_of_family" value="{{$response->head_of_family}}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Fathers' name:</label>
                        <input type="text" readonly class="form-control" name="father_name" value="{{$response->father_name}}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Husbands' name:</label>
                        <input type="text" readonly class="form-control" name="husband_name" value="{{$response->husband_name}}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contact Number:</label>
                        <input type="text" readonly class="form-control" name="contact_number" value="{{$response->contact_number}}">
                    </div>                   

                    <div class="mb-3">
                        <label  class="form-label">Nature of resident:</label>
                        <select class="form-select" name="nature_of_resident" disabled>
                            <option selected value="null">--- select ---</option>
                          @foreach (natureOfResident() as $key=>$value)
                              <option value="{{$value}}" {{$response->nature_of_resident==$value ? 'selected':''}}>{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Holding Number:</label>
                        <input type="text" readonly class="form-control" name="holding_number" value="{{$response->holding_number}}">
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Permanent resident:</label>
                        <select class="form-select" name="permanent_resident" disabled>
                            <option selected value="null">--- select ---</option>
                          @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}" {{$response->permanent_resident==$value ? 'selected':''}}>{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Permanent resident in rented house:</label>
                        <select class="form-select" name="permanent_resident_rented" disabled>
                            <option selected value="null">--- select ---</option>
                          @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}" {{$response->permanent_resident_rented==$value ? 'selected':''}}>{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Temporary resident in rented house:</label>
                        <select class="form-select" name="temporary_resident_rented" disabled>
                            <option selected value="null">--- select ---</option>
                          @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}" {{$response->temporary_resident_rented==$value ? 'selected':''}}>{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Other Type Resident:</label>
                        <input type="text" readonly class="form-control" name="other_type_resident" value="{{$response->other_type_resident}}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. of family members:</label>
                        <input type="text" readonly class="form-control" name="family_members" value="{{$response->family_members}}">
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Only Old Age Family:</label>
                        <select class="form-select" name="old_age_family" disabled>
                            <option selected value="null">--- select ---</option>
                          @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}" {{$response->old_age_family==$value ? 'selected':''}}>{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">No. of members (Age between 59 to 20): </label>
                        <select class="form-select" name="members_59_to_20" disabled>
                            <option selected value="null">--- select ---</option>
                            @for ($i = 0; $i < 10; $i++)
                            <option value="{{$i}}" {{$response->members_59_to_20==$value ? 'selected':''}}>{{$i}}</option>
                            @endfor
                            <option value="10+">10+</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">No. of members (Age between 19 to 20): </label>
                        <select class="form-select" name="members_19_to_20" disabled>
                            <option selected value="null">--- select ---</option>
                            @for ($i = 0; $i < 10; $i++)
                            <option value="{{$i}}" {{$response->members_19_to_20==$value ? 'selected':''}}>{{$i}}</option>
                            @endfor
                            <option value="10+">10+</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">No. of members (Age below 10): </label>
                        <select class="form-select" name="members_below_10" disabled>
                            <option selected value="null">--- select ---</option>
                            @for ($i = 0; $i < 10; $i++)
                            <option value="{{$i}}" {{$response->members_below_10==$value ? 'selected':''}}>{{$i}}</option>
                            @endfor
                            <option value="10+">10+</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">No. of female members (Age between 14 to 50): </label>
                        <select class="form-select" name="females_14_to_50" disabled>
                            <option selected value="null">--- select ---</option>
                            @for ($i = 0; $i < 10; $i++)
                            <option value="{{$i}}" {{$response->females_14_to_50==$value ? 'selected':''}}>{{$i}}</option>
                            @endfor
                            <option value="10+">10+</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Building category: </label>
                        <select class="form-select" name="building_category" disabled>
                            <option selected value="null">--- select ---</option>
                            @foreach (buildingCategory() as $key=>$value)
                              <option value="{{$value}}" {{$response->building_category==$value ? 'selected':''}}>{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Toilet type: </label>
                        <select class="form-select" name="toilet_type" disabled>
                            <option selected value="null">--- select ---</option>
                            @foreach (toiletType() as $key=>$value)
                              <option value="{{$value}}" {{$response->toilet_type==$value ? 'selected':''}}>{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">If, has any septic tank in HHL, Last year of cleaning:</label>
                        <input type="date" readonly class="form-control" name="septic_tank_cleaning_year" value="{{$response->septic_tank_cleaning_year}}">
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">If there have septic tank with sock pit:</label>
                        <select class="form-select" name="septic_tank_with_sock_pit" disabled>
                            <option selected value="null">--- select ---</option>
                          @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}" {{$response->septic_tank_with_sock_pit==$value ? 'selected':''}}>{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Water connection to HH:</label>
                        <select class="form-select" name="water_connection" disabled>
                            <option selected value="null">--- select ---</option>
                          @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}" {{$response->water_connection==$value ? 'selected':''}}>{{$key}}</option>
                          @endforeach
                          <option value="required" {{$response->water_connection=='required' ? 'selected':''}}>Required</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Member of bulk waste generator (BWG): </label>
                        <select class="form-select" name="bulk_waste_generator" disabled>
                            <option selected value="null">--- select ---</option>
                          @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}" {{$response->bulk_waste_generator==$value ? 'selected':''}}>{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Waste bin received from Municipality, Corporation, NAA: </label>
                        <select class="form-select" name="waster_bin_received" disabled>
                            <option selected value="null">--- select ---</option>
                          @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}" {{$response->waster_bin_received==$value ? 'selected':''}}>{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Best time for waste collection:</label>
                        <input type="time" readonly class="form-control" name="waste_collection_time" value="{{$response->waste_collection_time}}">
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Present waste collection system is in there? </label>
                        <select class="form-select" name="present_waste_collection" disabled>
                            <option selected value="null">--- select ---</option>
                          @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}" {{$response->present_waste_collection==$value ? 'selected':''}}>{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Approx Bio-Degradable (Wet) waste generation:</label>
                        <input type="text" readonly class="form-control" pattern="^[0-9]*" placeholder="in Kg." name="wet_waste_generation" value="{{$response->wet_waste_generation}}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Approx Bio-Degradable (Dry) waste generation:</label>
                        <input type="text" readonly class="form-control" pattern="^[0-9]*" placeholder="in Kg." name="dry_waste_generation" value="{{$response->dry_waste_generation}}">
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Any scope of bio-medical waste generation? </label>
                        <select class="form-select" name="bio_medical_waste_scope" disabled>
                            <option selected value="null">--- select ---</option>
                          @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}" {{$response->bio_medical_waste_scope==$value ? 'selected':''}}>{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Residence with commercial/office setup: </label>
                        <select class="form-select" name="residence_of_commercial" disabled>
                            <option selected value="null">--- select ---</option>
                          @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}" {{$response->residence_of_commercial==$value ? 'selected':''}}>{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Orient on municipal waste collection system?: </label>
                        <select class="form-select" name="orient_on_municipal_waste_collection" disabled>
                            <option selected value="">--- select ---</option>
                          @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}" {{$response->orient_on_municipal_waste_collection==$value ? 'selected':''}}>{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Orient on source segregation?: </label>
                        <select class="form-select" name="orient_on_source_segregation" disabled>
                            <option selected value="">--- select ---</option>
                          @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}" {{$response->orient_on_source_segregation==$value ? 'selected':''}}>{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Name of assign “Nirmal Sathi” :</label>
                        <input type="text" class="form-control" name="name_of_assign" disabled value="{{$response->name_of_assign}}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Other Comments:</label>
                        <textarea name="other_comments" readonly class="form-control" cols="30" rows="5">{{$response->other_comments}}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Uploaded Signature:</label>
                        @if ($response->signature)
                        <img src="{{env('APP_URL').'uploads/'.$response->signature}}" alt="" width="100" height="100" >
                        @endif
                        {{-- <input type="file" class="form-control" name="signature" accept=".png, .jpeg, .pdf"> --}}
                        
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Uploaded Other file:</label>
                        @if ($response->other_file)
                        <img src="{{env('APP_URL').'uploads/'.$response->other_file}}" alt="" width="100" height="100" >
                        @endif
                        {{-- <input type="file" class="form-control" name="other_file" accept=".png, .jpeg, .pdf"> --}}
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Latitude:</label>
                        <input type="text" readonly class="form-control" id="lat" name="latitude" value="{{$response->latitude}}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Longitude:</label>
                        <input type="text" readonly class="form-control" id="long" name="longitude" value="{{$response->longitude}}">
                    </div>
                    {{-- <input type="hidden" name="survey_response_time" id="response_time"> --}}
                    {{-- <input type="hidden" name="user_id" value="{{$user_id}}"> --}}
                    {{-- <input type="hidden" name="survey_id" value="{{$survey_id}}"> --}}
                    {{-- <input type="hidden" name="template_id" value="{{$response->template_id}}"> --}}
                    {{-- <input type="hidden" name="id" value="{{$response->id}}"> --}}
                    
                    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                    <a href="{{url('survey-responses/'.encrypt($response->survey_id).'/template/'.encrypt($response->template_id))}}" class="btn btn-secondary">Back</a>
                  </form>
                
            </div>
        </div>
    </div>
</div>

@stop

