@extends('backend.layouts.default')
@section('page_title', 'Dashboard')
@section('content')

{{-- commercial setup survey --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">New Survey Response
                    <a href="{{url('survey-responses/'.encrypt($survey_id).'/template/'.encrypt($template_id))}}" class="float-end btn btn-secondary">Back</a>
                </h5>
            </div>
            
            <div class="card-body">
                <form action="{{url('new-survey-response')}}" id="form" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label">Ward No*:</label>
                        <input type="text" class="form-control"  name="ward_number" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Location/Market Name*:</label>
                        <input type="text" class="form-control"  name="location_name" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Business/Institution Name*:</label>
                        <input type="text" class="form-control"  name="business_name" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Business owner/Head of institution name*:</label>
                        <input type="text" class="form-control"  name="business_owner" required>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Category*: </label>
                        <select class="form-select" name="category" required>
                            <option selected value="null">--- select ---</option>                           
                            <option selected value="bwg">BWG</option>                           
                            <option selected value="general">General</option>                           
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address (in short)*:</label>
                        <input type="text" class="form-control"  name="short_address" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contact Number:</label>
                        <input type="text" class="form-control"  name="contact_number">
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Nature of business/Institution*: </label>
                        <select class="form-select" name="nature_of_business" required>
                            <option selected value="null">--- select ---</option>
                          @foreach (natureOfBusiness() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Office/Type of business/Institution*: </label>
                        <select class="form-select" name="type_of_business" required>
                            <option selected value="null">--- select ---</option>
                          @foreach (typeOfBusiness() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Total no. of employee/staffs/students/service receiver/others*:</label>
                        <input type="text" class="form-control"  name="total_employee" required>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Toilet type*: </label>
                        <select class="form-select" name="toilet_type" required>
                            <option selected value="null">--- select ---</option>
                            @foreach (toiletType() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Any retrofitting of toilet required*: </label>
                        <select class="form-select" name="retrofitting_toilet" required>
                            <option selected value="null">--- select ---</option>
                            @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">In shop/Market/Institution everyday quantity of waste generated (in Kg.)*:</label>
                        <input type="text" class="form-control"  name="generated_waste" required>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Vegetable Waste*: </label>
                        <select class="form-select" name="vegetable_waste" required>
                            <option selected value="null">--- select ---</option>
                            @foreach (wasteMeasure() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Fish waste generated per day*: </label>
                        <select class="form-select" name="fish_waste" required>
                            <option selected value="null">--- select ---</option>
                            @foreach (wasteMeasureTwo() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Meat waste generated per day*: </label>
                        <select class="form-select" name="meat_waste" required>
                            <option selected value="null">--- select ---</option>
                            @foreach (wasteMeasureTwo() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Present practices of waste disposal*: </label>
                        <select class="form-select" name="present_waste_practices" required>
                            <option selected value="null">--- select ---</option>
                            @foreach (wastePractices() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Municipality provide waste collection bin*: </label>
                        <select class="form-select" name="municipality_waste_bin" required>
                            <option selected value="null">--- select ---</option>
                            @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">It is adequate*: </label>
                        <select class="form-select" name="it_is_adequate" required>
                            <option selected value="null">--- select ---</option>
                            @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Dustbin available at Institution/Shop/Office*: </label>
                        <select class="form-select" name="dustbin_available" required>
                            <option selected value="null">--- select ---</option>
                            @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Institution/Shop/Office: Willing to pay for taking the wastage materials: </label>
                        <select class="form-select" name="willing_to_pay_for_taking_waste">
                            <option selected value="null">--- select ---</option>
                            @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Proposed time of waste collection from your Institution/shop/office*: </label>
                        <select class="form-select" name="waste_collection_time" required>
                            <option selected value="null">--- select ---</option>
                            @foreach (collectionTime() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Carry bag used for products/services*: </label>
                        <select class="form-select" name="carry_bag_used" required>
                            <option selected value="null">--- select ---</option>
                            @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Customer/Service receiver can give money for carry bags of your product/services*: </label>
                        <select class="form-select" name="can_give_money_for_carry" required>
                            <option selected value="null">--- select ---</option>
                            @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}">{{$key}}</option>
                            @endforeach
                        </select>
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
                    <input type="hidden" name="survey_response_time" id="response_time">
                    <input type="hidden" name="user_id" value="{{session()->get('loggedUser')->user_id}}">
                    <input type="hidden" name="survey_id" value="{{$survey_id}}">
                    <input type="hidden" name="template_id" value="{{$template_id}}">
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

