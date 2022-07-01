@extends('backend.layouts.default')
@section('page_title', 'Dashboard')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Wrapup your activity
                  @if (Session::has('error'))
                    <span class="text-danger">> {{ Session::get('error') }}</span>
                  @endif
                  @if (Session::has('success'))
                    <span class="text-success">> {{ Session::get('success') }}</span>
                  @endif
                    {{-- <a href="{{url('employees')}}" class="float-end btn btn-secondary">Back</a> --}}
                </h5>
            </div>
            
            <div class="card-body">
              @if (empty(session()->get('loggedUser')->time_out))
              <h5 class="text-danger">After time-out you can not modify activity any more</h5>
              <form action="{{url('activity-wrapup')}}" method="post" >
                @csrf                           
                @foreach ($activities as $item)
                <div class="form-check mb-3 fs-3">
                    <input class="form-check-input" type="checkbox" name="activities[]" value="{{$item->id}}" id="flexCheckChecked{{$item->id}}" {{(in_array($item->id,$wrapped))?'checked':''}}>
                    <label class="form-check-label" for="flexCheckChecked{{$item->id}}">{{$item->name}}</label>
                </div>
                @endforeach           
                   
                <button type="submit" class="btn btn-primary">Submit</button>
                {{-- <a href="{{url('employees')}}" class="btn btn-secondary">Cancel</a> --}}
              </form> 
              @else
              <p class="text-danger text-center"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" style="height: 30px;width:30px" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle align-middle"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg></p>
                  <h4 class="text-danger text-center">  Activity wrapup terminal is now closed for today !!</h4>
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


