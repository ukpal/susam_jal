@extends('backend.layouts.default')
@section('page_title', 'Dashboard')
@section('content')

<style>
    .card-header {
    background-color: #f3f3f3;
    border-bottom: 0.5px solid #00000026 !important;
}
</style>



@if (Session::has('error'))
<script>
    alert("{{ Session::get('error') }}");
</script>
@endif

<div id="quick-view-card">

</div>


@stop

@section('scripts')
<script>
    $(document).ready(function(){
        $.ajax({
            type: 'GET',
            url: "{{env('APP_URL')}}"+"dashboard-quick-view",
            success: function(data) {
              document.getElementById("quick-view-card").innerHTML = data;
            },
            error: function(data) {
                console.log(data);
            }
        });
    })  
</script>
    
@endsection