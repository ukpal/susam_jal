@extends('backend.layouts.default')
@section('page_title', 'Dashboard')
@section('content')



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Update Survey
                    <a href="{{url('all-survey')}}" class="float-end btn btn-secondary">Back</a>
                </h5>
            </div>
            
            <div class="card-body">
                <form action="{{url('edit-assign-survey')}}" method="post" class="needs-validation" novalidate>
                    @csrf
                    <input type="hidden" name="id" value="{{$survey->id}}">
                    <div class="mb-3">
                      <label  class="form-label">District:</label>
                      <select class="form-select" name="district_id" id="district" required>
                        <option selected value="">Select District</option>
                        @foreach ($districts as $item)
                        <option value="{{$item->id}}" {{$item->id==$survey->district_id ? 'selected' : ''}}>{{$item->name}}</option>
                        @endforeach
                      </select>                     
                    </div>
                    <div class="mb-3">
                      <label  class="form-label">Sub-Division:</label>
                      <select class="form-select" id="sub_division" name="sub_division_id" required>
                        <option selected value="">-----select-----</option>
                        @foreach ($specific_sub_division as $item)
                        <option value="{{$item->id}}" {{$item->id==$survey->sub_division_id ? 'selected' : ''}}>{{$item->name}}</option>
                        @endforeach
                      </select>                     
                    </div>
                    <div class="mb-3">
                      <label  class="form-label">ULBs:</label>
                      <select class="form-select" id="ulb" name="ulb_id" required>
                        <option selected value="">------Select ULB-------</option>
                        @foreach ($specific_ulb as $item)
                        <option value="{{$item->id}}" {{$item->id==$survey->ulb_id ? 'selected' : ''}}>{{$item->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    {{-- <div class="mb-3">
                      <label  class="form-label">Sub Division:</label>
                      <select class="form-select" id="survey_area" name="area_id" required>
                        <option selected value="">Select Area</option>
                        @foreach ($specific_areas as $item)
                        <option value="{{$item->id}}" {{$item->id==$survey->area_id ? 'selected' : ''}}>{{$item->name}}</option>
                        @endforeach
                      </select>
                    </div> --}}
                    {{-- <input type="text" name="template_id"> --}}
                    <div class="mb-3">
                      <label  class="form-label">Survey Type:</label>
                      <select class="form-select" name="survey_type_id"  required>
                        <option selected value="">Select Survey Type</option>
                        @foreach ($types as $item)
                        <option value="{{$item->id}}" {{$item->id==$survey->survey_type_id ? 'selected' : ''}}>{{$item->name}}</option>
                        @endforeach                      
                      </select>
                    </div>
                    {{-- <div class="mb-3">
                        <label  class="form-label">Survey Template:</label>
                        <select class="form-select" id="template_id" name="template_id" required>
                            <option selected value="">Select Template</option>
                            @foreach ($specific_templates as $item)
                              <option value="{{$item->id}}" {{$item->id==$survey->template_id ? 'selected' : ''}}>{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div> --}}

                    <div class="row g-3 mb-3">
                      <div class="col-sm-3">
                        Duration:
                      </div>
                      <div class="col-sm">
                        Start: <input type="date" onchange="checkAvailability({{$users}},{{$survey->id}})" class="form-control" value="{{$survey->start_date}}" placeholder="From" name="start_date" id="start_date" required>
                      </div>
                      <div class="col-sm">
                        End: <input type="date" onchange="checkAvailability({{$users}},{{$survey->id}})" class="form-control" value="{{$survey->end_date}}" placeholder="To" name="end_date" id="end_date" required>
                      </div>
                    </div>
                    
                    <div class="mb-3">
                      <label  class="form-label">Surveyor:</label>
                      <select class="form-select" name="users[]" id="surveyors" aria-label="Default select example" multiple required>
                        <option selected value="">Select Surveyor</option>
                        
                      </select>
                    </div>
                    
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Total Survey:</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" name="no_of_survey" value="{{$survey->no_of_survey}}">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{url('all-survey')}}" class="btn btn-secondary">Cancel</a>
                  </form>
                
            </div>
        </div>
    </div>
</div>

<script>
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

@section('scripts')
    <script>
      $('#district').on('change',function(){
        var dist_id=$(this).val();
        var subds = <?= $subds ?>;
        var out = ""; 
        for (var i = 0; i < subds.length; i++) { 
            if(subds[i].district_id==dist_id){
                out += '<option value="' + subds[i].id + '">' + subds[i].name + '</option>'; 
            }
        } 
        document.getElementById("sub_division").innerHTML = out;
      });

      $('#sub_division').on('change',function(){
        var sub_division=$(this).val();
        var areas = <?= $ulbs ?>;
        var out = ""; 
        var area_type='';
        for (var i = 0; i < areas.length; i++) { 
            if(areas[i].sub_division_id==sub_division){
                out += '<option value="' + areas[i].id + '">' + areas[i].name +'</option>'; 
            }
        } 
        document.getElementById("ulb").innerHTML = out;
      });

      function checkAvailability(users,survey_id,survey_users){
        start_date=$("#start_date").val();
        end_date=$("#end_date").val();
        if(start_date==''){
          $("#start_date").focus();
          return false;
        }
        if(end_date==''){
          $("#end_date").focus();
          return false;
        }
        var arr=[]
        for (i = 0; i < survey_users.length; i++) { 
          arr.push(survey_users[i].surveyor_id)
        }
        console.log(arr)
        var out = ""; 
        var i; 
        $.ajax({
            type: 'GET',
            url: "{{env('APP_URL')}}"+"checkSurveyorByDate/" + start_date+"/"+end_date+"/"+survey_id,
            success: function(data) {
              for (i = 0; i < users.length; i++) {     
                var is_selected=(arr.includes(users[i].surveyor_id)) ? 'selected' : '';
                if(!data.includes(users[i].id)){
                  out += '<option '+is_selected+' value="' + users[i].surveyor_id + '">' + users[i].name + '</option>';
                }            
              } 
              document.getElementById("surveyors").innerHTML = out;
            },
            error: function(data) {
                // console.log(data);
            }
        });
      }
      
      $(document).ready(function(){
        checkAvailability(<?= $users ?>,<?= $survey->id ?>,<?= $survey->has_users ?>);
      });
    </script>
@endsection

