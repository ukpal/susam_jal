@extends('backend.layouts.default')
@section('page_title', 'Dashboard')
@section('content')


@if (Session::has('error'))
<script>
    alert("{{ Session::get('error') }}");
</script>
@endif

<div class="row">
    <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Dashboard </h5>
            </div>
            <div class="card-body">
                Dashboard Content
               @php
                   print_r(session()->get('loggedUser'))
               @endphp
                
            </div>
        </div>
    </div>
</div>

@stop