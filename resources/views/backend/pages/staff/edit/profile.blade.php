@extends('backend.layouts.default')
@section('page_title', 'Dashboard')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">update profile
                  @if (Session::has('error'))
                    <span class="text-danger">> {{ Session::get('error') }}</span>
                  @endif
                    <a href="{{url('dashboard')}}" class="float-end btn btn-secondary">Back</a>
                </h5>
            </div>
            
            <div class="card-body">
             

              <form action="{{url('update-profile')}}" method="post" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-3">
                  <label class="form-label">Employee Number:</label>
                  <input type="text" class="form-control" readonly name="emp_number" value="{{$emp->emp_number}}">
                </div>
                <div class="mb-3">
                  <label class="form-label">Name:</label>
                  <input type="text" class="form-control" name="name" value="{{$emp->name}}">
                </div>
                <div class="mb-3">
                  <label class="form-label">Mobile:</label>
                  <input type="tel" class="form-control" name="mobile" value="{{$emp->mobile}}">
                </div>
                <div class="mb-3">
                  <label class="form-label">Email:</label>
                  <input type="email" class="form-control" name="email" value="{{$emp->email}}">
                </div>
               
                <div class="mb-3">
                    <label class="form-label">Address:</label>
                    <input type="text" class="form-control" name="address" value="{{$emp->address}}">
                </div>
                <div class="mb-3">
                    <label  class="form-label">Gender: </label>
                    <select class="form-select" name="gender">
                        <option selected value="null">--- select ---</option>
                        @foreach (genderOptions() as $key=>$value)
                            <option value="{{$value}}" {{$emp->gender==$value ? 'selected' : ''}}>{{$key}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Department:</label>
                    <input type="text" class="form-control" readonly name="department" value="{{$emp->department}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Designation:</label>
                    <input type="text" class="form-control" readonly name="designation" value="{{$emp->designation}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Date of Joining:</label>
                    <input type="date" class="form-control" readonly name="date_of_joining" value="{{$emp->date_of_joining}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Profile Picture:</label>
                    <input type="file" class="form-control mb-2" name="profile_picture">
                    @if (!empty($emp->profile_picture))
                        <div style="max-width: 200px" id="picture_container">
                            <img src="{{env('APP_URL').'uploads/'.$emp->profile_picture}}" width="200" height="200">
                            <button type="button" class="btn btn-danger" style="position: absolute" onclick="deleteProfilePicture()">X</button>
                        </div>
                    @endif
                </div>
                      <input type="hidden" name="old_picture" id="old_picture">         
                <button type="submit" class="btn btn-primary">Submit Changes</button>
                <a href="{{url('dashboard')}}" class="btn btn-secondary">Cancel</a>
              </form> 
                  
                       
            </div>
        </div>
    </div>
</div>

<script>
    function deleteProfilePicture(){
        document.getElementById('old_picture').value="{{$emp->profile_picture}}";
        document.getElementById('picture_container').classList.add("d-none");
    }
</script>

@stop



