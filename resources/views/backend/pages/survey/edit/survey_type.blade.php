@extends('backend.layouts.default')
@section('page_title', 'Dashboard')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Add/Update survey types
                  @if (Session::has('error'))
                    <span class="text-danger">> {{ Session::get('error') }}</span>
                  @endif
                    <a href="{{url('survey-types')}}" class="float-end btn btn-secondary">Back</a>
                </h5>
            </div>
            
            <div class="card-body">
              @if (!empty($type))
                  
              <form action="{{url('edit-survey-type')}}" method="post" class="needs-validation" novalidate>
                @csrf                                      
                <input type="hidden" name="id" value="{{$type->id}}">
                <div class="mb-3">
                  <label class="form-label">Survey Name:</label>
                  <input type="text" class="form-control" name="name" value="{{$type->name}}" disabled>
                </div>
                <div class="my-3">
                  <label class="form-label me-5">Status:</label>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="is_active" {{$type->is_active==1 ? 'checked' : ''}} id="inlineRadio1" value="1">
                    <label class="form-check-label me-3" for="inlineRadio1">Active</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="is_active" {{$type->is_active==0 ? 'checked' : ''}} id="inlineRadio2" value="0">
                    <label class="form-check-label" for="inlineRadio2">Inactive</label>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{url('survey-types')}}" class="btn btn-secondary">Cancel</a>
              </form> 

              @else

              {{-- <form action="{{url('new-surveyor')}}" method="post" class="needs-validation" novalidate>
                @csrf                                      
                <div class="mb-3">
                  <label class="form-label">Full Name:</label>
                  <input type="text" class="form-control" name="name"  required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Mobile:</label>
                  <input type="text" class="form-control" name="phone" pattern="[0-9]{10}" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Email:</label>
                  <input type="email" class="form-control" name="email">
                </div>
                <div class="mb-3">
                  <label class="form-label">Address:</label>
                  <input type="text" class="form-control" name="address">
                </div>
                <div class="mb-3">
                  <label  class="form-label">Gender: </label>
                  <select class="form-select" name="gender">
                      <option selected value="null">--- select ---</option>
                    @foreach (genderOptions() as $key=>$value)
                        <option value="{{$value}}">{{$key}}</option>
                    @endforeach
                  </select>
                </div>               
                
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{url('surveyors')}}" class="btn btn-secondary">Cancel</a>
              </form>  --}}
              
              @endif
                               
            </div>
        </div>
    </div>
</div>

<script>
    function updateSurveyArea(dist_id,areas){
        var out = ""; 
        var i; 
        var area_type='';
        for (i = 0; i < areas.length; i++) { 
            if(areas[i].district_id==dist_id){
                if(areas[i].area_type!=null){
                    area_type=areas[i].area_type;
                }
                out += '<option value="' + areas[i].id + '">' + areas[i].name +' '+ area_type + '</option>'; 
            }
        } 
        document.getElementById("survey_area").innerHTML = out;
    }
    function updateSurveyTemplate(type_id,templates){
        var out = ""; 
        var i; 
        for (i = 0; i < templates.length; i++) { 
            if(templates[i].survey_type==type_id){
                out += '<option value="' + templates[i].id + '">' + templates[i].name + '</option>'; 
            }
        } 
        document.getElementById("template_id").innerHTML = out;
    }

    // Example starter JavaScript for disabling form submissions if there are invalid fields
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


