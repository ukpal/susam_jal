@extends('backend.layouts.default')
@section('page_title', 'Dashboard')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"> New Application
                  @if (Session::has('error'))
                    <span class="text-danger">> {{ Session::get('error') }}</span>
                  @endif
                    <a href="{{url('all-leave-applications')}}" class="float-end btn btn-secondary">Back</a>
                </h5>
            </div>
            
            <div class="card-body">
              

              <form action="{{url('edit-leave-application')}}" method="post" class="needs-validation" novalidate>
                @csrf                             
                <input type="hidden" name="id" value="{{$data->id}}">         
                <div class="mb-3">
                  <label class="form-label">Start Date:</label>
                  <input type="date" class="form-control" value="{{$data->start_date}}"  readonly>
                </div>                
                <div class="mb-3">
                  <label class="form-label">End Date:</label>
                  <input type="date" class="form-control" value="{{$data->end_date}}"  disabled>
                </div>                
                <div class="mb-3">
                  <label class="form-label">Description:</label>
                  <input type="text" class="form-control" value="{{$data->description}}" readonly>
                </div>   
                <div class="mb-3">
                  <label  class="form-label">Status: </label>
                  <select class="form-select" name="status">
                      <option selected value="null">--- select ---</option>                    
                      <option value="pending" {{$data->status=="pending" ? 'selected' : ''}}>pending</option>                   
                      <option value="approved" {{$data->status=="approved" ? 'selected' : ''}}>approved</option>                   
                      <option value="rejected" {{$data->status=="rejected" ? 'selected' : ''}}>rejected</option>                   
                  </select>
                </div>   
                <div class="mb-3">
                  <label class="form-label">Comment:</label>
                  <input type="text" class="form-control" name="comment" value="{{$data->comment}}">
                </div> 

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{url('all-leave-applications')}}" class="btn btn-secondary">Cancel</a>
              </form> 
              
              
                               
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


