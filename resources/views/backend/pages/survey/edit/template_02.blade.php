@extends('backend.layouts.default')
@section('page_title', 'Dashboard')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Edit Survey Response
                    <a href="{{url('all-responses/'.encrypt($response->survey_id).'/'.encrypt($response->template_id))}}" class="float-end btn btn-secondary">Back</a>
                </h5>
            </div>
            
            <div class="card-body">
                <form action="{{url('edit-response')}}" method="post" enctype="multipart/form-data" name="myForm">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label">Ward No:</label>
                        <input type="text"  class="form-control"  name="ward_number" value="{{$response->ward_number}}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Location/Market Name:</label>
                        <input type="text"  class="form-control"  name="location_name" value="{{$response->location_name}}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Business/Institution Name:</label>
                        <input type="text"  class="form-control"  name="business_name" value="{{$response->business_name}}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Business owner/Head of institution name:</label>
                        <input type="text"  class="form-control"  name="business_owner" value="{{$response->business_owner}}">
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Category: </label>
                        <select class="form-select" name="category">
                            <option selected value="null">--- select ---</option>                           
                            <option selected value="bwg" {{$response->category=='bwg' ? 'selected':''}}>BWG</option>                           
                            <option selected value="general" {{$response->category=='general' ? 'selected':''}}>General</option>                           
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address (in short):</label>
                        <input type="text"  class="form-control"  name="short_address" value="{{$response->short_address}}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contact Number:</label>
                        <input type="text"  class="form-control"  name="contact_number" value="{{$response->contact_number}}">
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Nature of business/Institution: </label>
                        <select class="form-select" name="nature_of_business" >
                            <option selected value="null">--- select ---</option>
                          @foreach (natureOfBusiness() as $key=>$value)
                              <option value="{{$value}}" {{$response->nature_of_business==$value ? 'selected':''}}>{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Office/Type of business/Institution: </label>
                        <select class="form-select" name="type_of_business" >
                            <option selected value="null">--- select ---</option>
                          @foreach (typeOfBusiness() as $key=>$value)
                              <option value="{{$value}}" {{$response->type_of_business==$value ? 'selected':''}}>{{$key}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Total no. of employee/staffs/students/service receiver/others:</label>
                        <input type="text"  class="form-control" pattern="^[0-9]*"  name="total_employee" value="{{$response->total_employee}}">
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Toilet type: </label>
                        <select class="form-select" name="toilet_type" >
                            <option selected value="null">--- select ---</option>
                            @foreach (toiletType() as $key=>$value)
                              <option value="{{$value}}" {{$response->toilet_type==$value ? 'selected':''}}>{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Any retrofitting of toilet required: </label>
                        <select class="form-select" name="retrofitting_toilet" >
                            <option selected value="null">--- select ---</option>
                            @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}" {{$response->retrofitting_toilet==$value ? 'selected':''}}>{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">In shop/Market/Institution everyday quantity of waste generated (in Kg.):</label>
                        <input type="text"  class="form-control" pattern="^[0-9]*"  name="generated_waste" value="{{$response->generated_waste}}">
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Vegetable Waste: </label>
                        <select class="form-select" name="vegetable_waste" >
                            <option selected value="null">--- select ---</option>
                            @foreach (wasteMeasure() as $key=>$value)
                              <option value="{{$value}}" {{$response->vegetable_waste==$value ? 'selected':''}}>{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Fish waste generated per day: </label>
                        <select class="form-select" name="fish_waste" >
                            <option selected value="null">--- select ---</option>
                            @foreach (wasteMeasureTwo() as $key=>$value)
                              <option value="{{$value}}" {{$response->fish_waste==$value ? 'selected':''}}>{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Meat waste generated per day: </label>
                        <select class="form-select" name="meat_waste" >
                            <option selected value="null">--- select ---</option>
                            @foreach (wasteMeasureTwo() as $key=>$value)
                              <option value="{{$value}}" {{$response->meat_waste==$value ? 'selected':''}}>{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Present practices of waste disposal: </label>
                        <select class="form-select" name="present_waste_practices" >
                            <option selected value="null">--- select ---</option>
                            @foreach (wastePractices() as $key=>$value)
                              <option value="{{$value}}" {{$response->present_waste_practices==$value ? 'selected':''}}>{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Municipality provide waste collection been: </label>
                        <select class="form-select" name="municipality_waste_bin" >
                            <option selected value="null">--- select ---</option>
                            @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}" {{$response->municipality_waste_bin==$value ? 'selected':''}}>{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">It is adequate: </label>
                        <select class="form-select" name="it_is_adequate" >
                            <option selected value="null">--- select ---</option>
                            @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}" {{$response->it_is_adequate==$value ? 'selected':''}}>{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Dustbin available at Institution/Shop/Office: </label>
                        <select class="form-select" name="dustbin_available" >
                            <option selected value="null">--- select ---</option>
                            @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}" {{$response->dustbin_available==$value ? 'selected':''}}>{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Institution/Shop/Office: Willing to pay for taking the wastage materials: </label>
                        <select class="form-select" name="willing_to_pay_for_taking_waste" >
                            <option selected value="null">--- select ---</option>
                            @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}" {{$response->willing_to_pay_for_taking_waste==$value ? 'selected':''}}>{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Proposed time of waste collection from your Institution/shop/office: </label>
                        <select class="form-select" name="waste_collection_time" >
                            <option selected value="null">--- select ---</option>
                            @foreach (collectionTime() as $key=>$value)
                              <option value="{{$value}}" {{$response->waste_collection_time==$value ? 'selected':''}}>{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Carry bag used for products/services: </label>
                        <select class="form-select" name="carry_bag_used" >
                            <option selected value="null">--- select ---</option>
                            @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}" {{$response->carry_bag_used==$value ? 'selected':''}}>{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Customer/Service receiver can give money for carry bags of your product/services: </label>
                        <select class="form-select" name="can_give_money_for_carry" >
                            <option selected value="null">--- select ---</option>
                            @foreach (yesNoNotApplicable() as $key=>$value)
                              <option value="{{$value}}" {{$response->can_give_money_for_carry==$value ? 'selected':''}}>{{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Uploaded Signature:</label>
                        @if ($response->signature)
                        <img src="{{env('APP_URL').'uploads/'.$response->signature}}" alt="" width="100" height="100" accept=".png, .jpeg, .pdf">
                        @endif
                        {{-- <input type="file" class="form-control" name="signature"> --}}
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Uploaded Other file:</label>
                        @if ($response->other_file)
                        <img src="{{env('APP_URL').'uploads/'.$response->other_file}}" alt="" width="100" height="100" accept=".png, .jpeg, .pdf">
                        @endif
                        {{-- <input type="file" class="form-control" name="other_file"> --}}
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Latitude:</label>
                        <input type="text"  class="form-control" id="lat" name="latitude" value="{{$response->latitude}}" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Longitude:</label>
                        <input type="text"  class="form-control" id="long" name="longitude" value="{{$response->longitude}}" >
                    </div>
                    {{-- <input type="hidden" name="survey_response_time" id="response_time"> --}}
                    {{-- <input type="hidden" name="user_id" value="{{$user_id}}"> --}}
                    <input type="hidden" name="template_name" value="{{$template_name}}">
                    <input type="hidden" name="template_id" value="{{$response->template_id}}">
                    <input type="hidden" name="id" value="{{$response->id}}">
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{url('all-responses/'.encrypt($response->survey_id).'/'.encrypt($response->template_id))}}" class="btn btn-secondary">Back</a>
                    <a href="{{url('response-pdf/'.encrypt($response->id).'/'.encrypt($template_name))}}" class="btn btn-secondary">Download as pdf</a>
                  </form>
                
            </div>
        </div>
    </div>
</div>

 

@stop

