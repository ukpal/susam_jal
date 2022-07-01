@extends('backend.layouts.default')
@section('page_title', 'Dashboard')
@section('style')
    <style>
      @media screen and (max-width: 480px) {
        .content{
          padding:20px 5px;
        }
      }

    </style>
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        {{-- @foreach ($jobs as $item) --}}
        @if (empty($jobs))
        <div class="card border-bottom border-primary">
            <div class="card-header bg-secondary text-white">
              Active Survey
            </div>
            <div class="card-body">
              <h2 class="text-danger">No Active Survey</h2>
              
            </div>
        </div>
        @else
        <div class="card border-bottom border-primary">
            <div class="card-header bg-secondary text-white">
              Active Survey
              <span class="float-end"><span class="text-danger">(</span> {{$jobs->start_date}} to {{$jobs->end_date}} <span class="text-danger">)</span></span>
            </div>
            <div class="card-body">
              <h2 >{{$jobs->survey}}</h2>
              <p class="card-text">{{$jobs->district}} , {{$jobs->subd}}, {{$jobs->ulb}}</p>
              <p class="card-text">You Completed = {{$completed_survey}}</p>
              <a href="{{url('survey-responses/'.encrypt($jobs->id).'/type/'.encrypt($jobs->survey_type_id))}}" class="btn btn-primary">See Responses</a>
              <a href="{{url('new-survey-response/'.encrypt($jobs->id))}}" class="ms-lg-3 my-3 btn btn-primary">+ New Response</a>
            </div>
        </div>
        @endif
        
        {{-- @endforeach --}}
        
    </div>
</div>

@stop