@extends('backend.layouts.default')
@section('page_title', 'Dashboard')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Change Your Password
                  @if (Session::has('error'))
                    <span class="text-danger">> {{ Session::get('error') }}</span>
                  @endif
                    <a href="{{url('dashboard')}}" class="float-end btn btn-secondary">Back</a>
                </h5>
            </div>
            
            <div class="card-body">
                <form action="{{url('change-password')}}" method="POST" name="myForm" onsubmit="return validate()">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Old Password</label>
                        <input class="form-control form-control-lg" required type="password" name="old_password"  />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input class="form-control form-control-lg" required type="password" id="new_password" name="new_password"  />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm New Password</label>
                        <input class="form-control form-control-lg" required type="password" id="confirm_password" name="confirm_new_password"  />
                    </div>
                   
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-lg btn-primary">Update</button>
                    </div>
                </form>                  
            </div>
        </div>
    </div>
</div>

<script>
    function validate(){
        // var error=false;
        if(document.getElementById('new_password').value()!=document.getElementById('confirm_password').value()){
            alert('Confirm Password does not match');
            return false;
        }
    }
</script>

@stop

@section('scripts')
    
@endsection


