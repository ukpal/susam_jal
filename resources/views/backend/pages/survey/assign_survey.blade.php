@extends('backend.layouts.default')
@section('page_title', 'Dashboard')
@section('content')



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Assign Survey
                    <a href="{{url('all-survey')}}" class="float-end btn btn-secondary">Back</a>
                </h5>
            </div>
            
            <div class="card-body">
                <form action="{{url('assign-survey')}}" method="post" class="needs-validation" novalidate>
                    @csrf
                    <div class="mb-3">
                      <label  class="form-label">District:</label>
                      <select class="form-select" name="district_id" id="district" required>
                        <option selected value="">-----select-----</option>
                        @foreach ($districts as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                      </select>                     
                    </div>
                    <div class="mb-3">
                      <label  class="form-label">Sub-Division:</label>
                      <select class="form-select" id="sub_division" name="sub_division_id" required>
                        <option selected value="">-----select-----</option>
                      </select>                     
                    </div>
                    {{-- <div class="mb-3">
                      <label  class="form-label">Gram Panchayat / Municipality:</label>
                      <select class="form-select" id="gp_or_mun" required>
                        <option selected value="">-----select-----</option>
                        <option  value="gp">Gram Pamchayat</option>
                        <option  value="mun">Municipality</option>
                      </select>                     
                    </div> --}}
                    
                    {{-- <div class="gp-group d-none">
                      <div class="mb-3">
                        <label  class="form-label">Select Block:</label>
                        <select class="form-select" id="block" name="block_id" required>
                          <option selected value="">-----select-----</option>
                        </select>                     
                      </div>
                      <div class="mb-3">
                        <label  class="form-label">Select Gram Panchayat:</label>
                        <select class="form-select" id="gp" name="gp_id" required>
                          <option selected value="">-----select-----</option>
                        </select>                     
                      </div>
                    </div> --}}
                    <div class="mb-3">
                      <label  class="form-label">ULBs:</label>
                      <select class="form-select" id="ulb" name="ulb_id" required>
                        <option selected value="">------Select ULB-------</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label  class="form-label">Survey Type:</label>
                      <select class="form-select" name="survey_type_id" id="survey_type_id" required>
                        <option selected value="">Select Survey Type</option>
                        @foreach ($types as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach                      
                      </select>
                    </div>

                    <div class="row g-3 mb-3">
                      <div class="col-sm-3">
                        Duration:
                      </div>
                      <div class="col-sm">
                        Start: <input type="date" onchange="checkAvailability({{$users}})" class="form-control" placeholder="From" name="start_date" id="start_date" required>
                      </div>
                      <div class="col-sm">
                        End: <input type="date" onchange="checkAvailability({{$users}})" class="form-control" placeholder="To" name="end_date" id="end_date" required>
                      </div>
                    </div>
                    
                    <div class="mb-3">
                      <label  class="form-label">Surveyor:</label>
                      <select class="form-select" name="users[]" size="10" id="surveyors" aria-label="Default select example" multiple required>
                        <option selected value="">Select Surveyor</option>
                        
                      </select>
                    </div>
                    
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Total Survey:</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" name="no_of_survey">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{url('all-survey')}}" class="btn btn-secondary">Cancel</a>
                  </form>
                
            </div>
        </div>
    </div>
</div>

<script>
    
    // function updateSurveyArea(dist_id,areas){
    //     var out = ""; 
    //     var i; 
    //     var area_type='';
    //     for (i = 0; i < areas.length; i++) { 
    //         if(areas[i].district_id==dist_id){
    //             if(areas[i].area_type!=null){
    //                 area_type=areas[i].area_type;
    //             }
    //             out += '<option value="' + areas[i].id + '">' + areas[i].name +' '+ area_type + '</option>'; 
    //         }
    //     } 
    //     document.getElementById("survey_area").innerHTML = out;
    // }
    // function updateSurveyTemplate(type_id,templates){
    //     var out = ""; 
    //     var i; 
    //     for (i = 0; i < templates.length; i++) { 
    //         if(templates[i].survey_type==type_id){
    //             out += '<option value="' + templates[i].id + '">' + templates[i].name + '</option>'; 
    //         }
    //     } 
    //     document.getElementById("template_id").innerHTML = out;
    // }

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
      })

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
      })

      function checkAvailability(users){
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
        
        var out = ""; 
        var i; 
        $.ajax({
            type: 'GET',
            url: "{{env('APP_URL')}}"+"checkSurveyorByDate/" + start_date+"/"+end_date,
            success: function(data) {
              for (i = 0; i < users.length; i++) {     
                if(!data.includes(users[i].surveyor_id)){
                  out += '<option value="' + users[i].surveyor_id + '">' + users[i].name + '</option>';
                }            
              } 
              document.getElementById("surveyors").innerHTML = out;
            },
            error: function(data) {
                console.log(data);
            }
        });
      }
    </script>
@endsection

