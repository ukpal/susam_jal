@extends('backend.layouts.default')
@section('page_title', 'Dashboard')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">All Survey Responses
                    <a href="{{url('all-survey')}}" class="float-end ms-3 btn btn-secondary">Back</a>
                    {{-- <a href="{{url('all-survey')}}" class="float-end btn btn-primary">+ New Response</a> --}}
                </h5>
            </div>
            <div class="card-body">
                @if ($template_name=='template_01')
                <table id="table_id" class="display">
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
                                <a href="{{url('edit-response/'.encrypt($item->id).'/'.encrypt($template_name))}}" class="btn btn-sm btn-primary" title="edit">E</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @endif
                
                @if ($template_name=='template_02')
                <table id="table_id_2" class="display">
                    <thead>
                        <tr>
                            <th>SL. No.</th>
                            <th>Business Owner</th>
                            <th>Ward No.</th>
                            <th>Survey Response Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($lists as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->business_owner}}</td>
                            <td>{{$item->ward_number}}</td>
                            <td>{{$item->survey_response_time}}</td>
                            <td>
                                <a href="{{url('edit-response/'.encrypt($item->id).'/'.encrypt($template_name))}}" class="btn btn-sm btn-primary" title="edit">E</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @endif
                
                
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