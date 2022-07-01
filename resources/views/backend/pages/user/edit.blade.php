@extends('backend.layouts.default')
@section('page_title', 'Dashboard')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Create/Update New User
                  @if (Session::has('error'))
                    <span class="text-danger">> {{ Session::get('error') }}</span>
                  @endif
                    <a href="{{url('users')}}" class="float-end btn btn-secondary">Back</a>
                </h5>
            </div>
            
            <div class="card-body">
              @if (!empty($user))

              <form action="{{url('edit-user')}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$user->user_id}}">
                <div class="mb-3">
                  <label class="form-label">User Email:</label>
                  <input type="text" class="form-control" readonly value="{{$user->employee->email}}">
                </div>
                <div class="mb-3">
                  <label class="form-label">New Password:</label>
                  <input type="text" class="form-control" name="password">
                </div>
                <div class="mb-3">
                  <label  class="form-label">Role: </label>
                  <select class="form-select" name="role_id">
                      <option selected value="null">--- select ---</option>
                    @foreach ($roles as $item)
                        <option value="{{$item->role_id}}" {{$user->role_id==$item->role_id ? 'selected' : ''}}>{{$item->name}}</option>
                    @endforeach
                  </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{url('users')}}" class="btn btn-secondary">Cancel</a>
              </form> 
                  
              @else
                               
              <form action="{{url('new-user')}}" method="post">
                  @csrf
                  <div class="mb-3">
                    <label  class="form-label">Employee: </label>
                    <select class="form-select" name="emp_number" onchange="showEmail(this.value,{{$emps}});">
                        <option selected value="">--- select ---</option>
                      @foreach ($emps as $item)
                          <option value="{{$item->emp_number}}">{{$item->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" readonly class="form-control" id="email">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Password:</label>
                    <input type="text" class="form-control" name="password">
                  </div>
                  <div class="mb-3">
                    <label  class="form-label">Role: </label>
                    <select class="form-select" name="role_id">
                        <option selected value="">--- select ---</option>
                      @foreach ($roles as $item)
                          <option value="{{$item->role_id}}">{{$item->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{url('users')}}" class="btn btn-secondary">Cancel</a>
              </form> 

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
    function showEmail(emp_number,emps){
      // console.log(emp_id)
      for (var i = 0; i < emps.length; i++) { 
          if(emps[i].emp_number==emp_number){
            document.getElementById("email").value = emps[i].email; 
            break;
          }
      }      
    }
</script>

@stop


