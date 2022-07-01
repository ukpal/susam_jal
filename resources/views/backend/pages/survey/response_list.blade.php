@extends('backend.layouts.default')
@section('page_title', 'Dashboard')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">All Survey Responses
                    <a href="{{url('my-survey')}}" class="float-end ms-3 btn btn-secondary">Back</a>
                    <a href="{{url('new-survey-response/'.encrypt($survey_id))}}" class="float-end btn btn-primary">+ New Response</a>
                </h5>
            </div>
            <div class="card-body">
                {{-- @if ($template_name=='template_01') --}}
                {{-- <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>SL. No.</th>
                            <th>Family Head</th>
                            <th>Survey Response Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($lists as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->head_of_family}}</td>
                            <td>{{$item->survey_response_time}}</td>
                            <td>
                                <a href="{{url('view-response/'.encrypt($item->id).'/template/'.encrypt($template_id))}}" class="btn btn-sm btn-primary" title="view response data">V</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table> --}}
                {{-- @endif --}}
                
                {{-- @if ($template_name=='template_02') --}}
                <table id="table_id_2" class="display">
                    <thead>
                        <tr>
                            <th>SL. No.</th>
                            <th>ULB</th>
                            <th>Ward No.</th>
                            <th>Survey Response Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($lists as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->ulb_name}}</td>
                            <td>{{$item->ward_no}}</td>
                            <td>{{$item->survey_response_time}}</td>
                            <td>
                                <a href="{{url('view-response/'.encrypt($item->id))}}" class="btn btn-sm btn-primary" title="view response data">V</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{-- @endif --}}
                
            </div>
        </div>
    </div>
</div>

@stop

@section('scripts')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script>
    $(document).ready( function () {
        $('#table_id').DataTable();
        $('#table_id_2').DataTable();
    } );
</script>
    
@endsection