@extends('backend.layouts.login')
@section('page_title', 'Login')
@section('content')

<main class="d-flex w-100">
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell">

                    <div class="text-center">
                        <img src="{{ asset('public/assets/img/ASJlogo.png') }}" alt="" width="220" height="200">
                        <p class="lead">
                            Sign in to your account to continue
                        </p>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            @if (Session::has('error'))
                            <p class="text-danger">{{ Session::get('error') }}</p>
                            @endif
                            <div class="m-sm-4">
                                <form action="{{url('login')}}" method="POST" onsubmit="return validateMyForm();">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input class="form-control form-control-lg" required type="email" name="email" placeholder="Enter your email" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input class="form-control form-control-lg" required type="password" name="password" placeholder="Enter your password" />
                                        <small><a href="index.html">Forgot password?</a></small>
                                        <small class="float-end"><a href="{{url('surveyor-login')}}">Surveyor Login</a></small>
                                    </div>
                                    <input type="hidden" name="long" id="long">
                                    <input type="hidden" name="lat" id="lat">
                                   
                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-lg btn-primary">Sign in</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>

<script>
    var getPosition=true;
    function initGeolocation()
    {
       if( navigator.geolocation )
       {
          // Call getCurrentPosition with success and failure callbacks
          navigator.geolocation.getCurrentPosition( success, fail );
       }
       else
       {
          alert("Sorry, your browser does not support geolocation services.");
       }
    }

    function success(position)
    {

        document.getElementById('long').value = position.coords.longitude;
        document.getElementById('lat').value = position.coords.latitude
    }

    function fail()
    {
       // Could not obtain location
       getPosition=false;
    }
    initGeolocation();

    function validateMyForm(){       
        if(getPosition){
            return true;
        }else{
            alert('Please on your location!!');
            return false;           
        }  
    }
</script>

@stop