@extends('backend.layouts.default')
@section('page_title', 'Dashboard')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">All Surveys
                    @if (Session::has('success'))
                    <span class="text-success">> {{ Session::get('success') }}</span>
                    @endif
                    @if (Session::has('error'))
                    <span class="text-danger">> {{ Session::get('error') }}</span>
                    @endif
                    <a href="{{url('assign-survey')}}" class="float-end btn btn-primary">Assign Survey</a>
                </h5>
            </div>
            <div class="card-body">
                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>Survey</th>
                            <th>District</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Surveyors</th>
                            <th>Total Survey</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($surveys as $item)
                        <tr>
                            <td>{{$item->type->name}}</td>
                            <td>{{$item->district->name}}</td>
                            <td>{{$item->start_date}}</td>
                            <td>{{$item->end_date}}</td>
                            <td>{{count($item->has_users)}}</td>
                            <td>{{$item->no_of_survey}}</td>
                            <td>
                                <a href="{{url('edit-assign-survey/'.encrypt($item->id))}}" class="btn btn-warning btn-sm" title="edit">E</a>
                                <a href="{{url('all-responses/'.encrypt($item->id).'/'.encrypt($item->template_id))}}" class="btn btn-info btn-sm" title="responses">R</a>
                                <a href="{{url('delete-survey/'.encrypt($item->id))}}" onclick="return confirm('Are you sure to delete this data ?')" class="btn btn-danger btn-sm" title="delete">D</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                
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
    } );
</script>
    
@endsection