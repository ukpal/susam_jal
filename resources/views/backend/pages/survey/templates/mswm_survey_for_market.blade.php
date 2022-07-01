@extends('backend.layouts.default')
@section('page_title', 'mswm_survey_for_market')
@section('content')

{{-- commercial setup survey --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">MSWM SURVEY FOR MARKET
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
                    <div class="mb-3">
                        <label class="form-label">Ward No <span class="text-danger">*</span>:</label>
                        <input type="text" class="form-control"  name="ward_number" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Location/Market Name <span class="text-danger">*</span>:</label>
                        <input type="text" class="form-control"  name="location_name" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Business Name/Institution/BWG name <span class="text-danger">*</span>:</label>
                        <input type="text" class="form-control"  name="business_name" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Business owner/Head of institution name <span class="text-danger">*</span>:</label>
                        <input type="text" class="form-control"  name="business_owner" required>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Category <span class="text-danger">*</span>: </label>
                        <select class="form-select" name="category" required>
                            <option selected value="">--- select ---</option>                           
                            <option  value="bwg">BWG</option>                           
                            <option  value="general">General</option>                           
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address (in short) <span class="text-danger">*</span>:</label>
                        <input type="text" class="form-control"  name="short_address" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contact Number:</label>
                        <input type="text" class="form-control"  name="contact_number">
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Nature of business/Institution <span class="text-danger">*</span>: </label>
                        <select class="form-select" name="nature_of_business" required>
                            <option selected value="">--- select ---</option>
                        @foreach (natureOfBusiness() as $key=>$value)
                            <option value="{{$value}}">{{$key}}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Office/Type of business/Institution <span class="text-danger">*</span>: </label>
                        <select class="form-select" name="type_of_business" required>
                            <option selected value="">--- select ---</option>
                        @foreach (typeOfBusiness() as $key=>$value)
                            <option value="{{$value}}">{{$key}}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Total no. of employee/staffs/students/service receiver/others <span class="text-danger">*</span>:</label>
                        <input type="number" class="form-control"  name="total_employee" required>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Toilet type <span class="text-danger">*</span>: </label>
                        <select class="form-select" name="toilet_type" required>
                            <option selected value="">--- select ---</option>
                            @foreach (toiletType() as $key=>$value)
                            <option value="{{$value}}">{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Any retrofitting of toilet required <span class="text-danger">*</span>: </label>
                        <select class="form-select" name="retrofitting_toilet" required>
                            <option selected value="">--- select ---</option>
                            @foreach (yesNoNotApplicable() as $key=>$value)
                            <option value="{{$value}}">{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">In shop/Market/Institution everyday quantity of waste generated (in Kg.)/day <span class="text-danger">*</span>:</label>
                        <input type="number" class="form-control"  name="generated_waste" required>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Vegetable Waste <span class="text-danger">*</span>: </label>
                        <select class="form-select" name="vegetable_waste" required>
                            <option selected value="">--- select ---</option>
                            @foreach (wasteMeasure() as $key=>$value)
                            <option value="{{$value}}">{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Fish waste generated per day <span class="text-danger">*</span>: </label>
                        <select class="form-select" name="fish_waste" required>
                            <option selected value="">--- select ---</option>
                            @foreach (wasteMeasureTwo() as $key=>$value)
                            <option value="{{$value}}">{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Meat waste generated per day <span class="text-danger">*</span>: </label>
                        <select class="form-select" name="meat_waste" required>
                            <option selected value="">--- select ---</option>
                            @foreach (wasteMeasureTwo() as $key=>$value)
                            <option value="{{$value}}">{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Present practices of waste disposal <span class="text-danger">*</span>: </label>
                        <select class="form-select" name="present_waste_practices" required>
                            <option selected value="">--- select ---</option>
                            @foreach (wastePractices() as $key=>$value)
                            <option value="{{$value}}">{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Waste collection bin provided by Municipality <span class="text-danger">*</span>: </label>
                        <select class="form-select" name="municipality_waste_bin" required>
                            <option selected value="">--- select ---</option>
                            @foreach (yesNoNotApplicable() as $key=>$value)
                            <option value="{{$value}}">{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Is it adequate <span class="text-danger">*</span>: </label>
                        <select class="form-select" name="it_is_adequate" required>
                            <option selected value="">--- select ---</option>
                            @foreach (yesNoNotApplicable() as $key=>$value)
                            <option value="{{$value}}">{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Dustbin available at Institution/Shop/Office <span class="text-danger">*</span>: </label>
                        <select class="form-select" name="dustbin_available" required>
                            <option selected value="">--- select ---</option>
                            @foreach (yesNoNotApplicable() as $key=>$value)
                            <option value="{{$value}}">{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Institution/Shop/Office: Willing to pay for removal the wastage materials: </label>
                        <select class="form-select" name="willing_to_pay_for_taking_waste">
                            <option selected value="">--- select ---</option>
                            @foreach (yesNoNotApplicable() as $key=>$value)
                            <option value="{{$value}}">{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Proposed time of waste collection from your Institution/shop/office <span class="text-danger">*</span>: </label>
                        <select class="form-select" name="waste_collection_time" required>
                            <option selected value="">--- select ---</option>
                            @foreach (collectionTime() as $key=>$value)
                            <option value="{{$value}}">{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Carry bag used for products/services <span class="text-danger">*</span>: </label>
                        <select class="form-select" name="carry_bag_used" required>
                            <option selected value="">--- select ---</option>
                            @foreach (yesNoNotApplicable() as $key=>$value)
                            <option value="{{$value}}">{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Customer/Service receiver can give money for carrying bags of your product/services <span class="text-danger">*</span>: </label>
                        <select class="form-select" name="can_give_money_for_carry" required>
                            <option selected value="">--- select ---</option>
                            @foreach (yesNoNotApplicable() as $key=>$value)
                            <option value="{{$value}}">{{$key}}</option>
                            @endforeach
                        </select>
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

