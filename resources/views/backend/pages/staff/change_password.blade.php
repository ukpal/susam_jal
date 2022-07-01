@extends('backend.layouts.login')
@section('page_title', 'Login')
@section('content')

<main class="d-flex w-100">
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center mt-4">
                        <p class="lead">
                            Change your default password to continue
                        </p>
                    </div>
                    
                    <div class="card">
                        <div class="card-body">
                            @if (Session::has('error'))
                            <p class="text-danger">{{ Session::get('error') }}</p>
                            @endif
                            <div class="m-sm-4">
                                <form action="{{url('change-password')}}" method="POST" name="myForm" onsubmit="return validate()">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Old Password</label>
                                        <input class="form-control form-control-lg" required type="password" name="old_password"  />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">New Password</label>
                                        <input class="form-control form-control-lg" required type="password" name="new_password"  />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Confirm New Password</label>
                                        <input class="form-control form-control-lg" required type="password" name="confirm_new_password"  />
                                    </div>
                                   
                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                    </div>
                                </form>
                                {{-- <p><a href="{{url('logout')}}">Logout</a></p> --}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function validate(){
        if( document.myForm.head_of_family.value == "" ) {
            document.myForm.head_of_family.classList.add("is-invalid");
            return false;
        }else{
            document.myForm.head_of_family.classList.remove("is-invalid");
        }
    }
</script>

@stop