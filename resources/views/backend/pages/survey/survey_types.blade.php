@extends('backend.layouts.default')
@section('page_title', 'Dashboard')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Survey Types
                    @if (Session::has('success'))
                            <span class="text-success">>{{ Session::get('success') }}</span>
                        @endif
                        @if (Session::has('error'))
                            <span class="text-danger">>{{ Session::get('error') }}</span>
                        @endif
                </h5>
            </div>
            <div class="card-body">
                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($types as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->name}}</td>
                            <td>
                                @if ($item->is_active)
                                <span class="badge rounded-pill bg-success">active</span>
                                @else
                                <span class="badge rounded-pill bg-danger">inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{url('edit-survey-type/'.encrypt($item->id))}}" class="btn btn-primary btn-sm" title="edit">E</a>
                                <a href="{{url('view-survey-template/'.encrypt($item->name))}}" class="btn btn-info btn-sm" title="view template">V</a>
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