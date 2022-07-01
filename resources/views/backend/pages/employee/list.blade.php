@extends('backend.layouts.default')
@section('page_title', 'Dashboard')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Employees
                    @if (Session::has('success'))
                    <span class="text-success">>{{ Session::get('success') }}</span>
                    @endif
                    @if (Session::has('error'))
                        <span class="text-danger">>{{ Session::get('error') }}</span>
                    @endif
                    <a href="{{url('new-employee')}}" class="float-end btn btn-primary">New Employee</a>
                </h5>
            </div>
            <div class="card-body">
                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>Employee Number</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($emps as $emp)
                        <tr>
                            <td>{{$emp->emp_number}}</td>
                            <td>{{$emp->name}}</td>
                            <td>{{$emp->mobile}}</td>
                            <td>{{$emp->email}}</td>
                            <td>
                                <a href="{{url('edit-employee/'.encrypt($emp->emp_id))}}" class="btn btn-primary btn-sm" title="edit">E</a>
                                <a href="{{url('delete-employee/'.encrypt($emp->emp_id))}}" onclick="return confirm('Are you sure to delete this data ?')" class="btn btn-danger btn-sm" title="delete">D</a>
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