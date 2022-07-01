@extends('backend.layouts.default')
@section('page_title', 'Dashboard')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                {{-- <h5 class="card-title mb-3">Calender</h5> --}}
                
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-4">
                        @if (Session::has('success'))
                            <span class="text-success">>{{ Session::get('success') }}</span>
                        @endif
                        @if (Session::has('error'))
                            <span class="text-danger">>{{ Session::get('error') }}</span>
                        @endif
                        <form action="{{url('offdays')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Date:</label>
                                <input type="date" class="form-control" name="date" min="2022-01-01" max="2022-12-31"  required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Type:</label>
                                <select class="form-select" name="type">
                                    <option selected value="null">--- select ---</option>
                                    <option value="weekoff">Weekoff</option>
                                    <option value="holiday">Holiday</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description:</label>
                                <input type="text" class="form-control" name="description" >
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="col-md-8">
                        <table id="table_id" class="display">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dates as $item)
                                <tr>
                                    <td>{{$item->date}}</td>
                                    <td>{{$item->type}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>
                                        <a href="{{url('delete-offday/'.encrypt($item->id))}}" onclick="return confirm('Are you sure to delete this data ?')" class="btn btn-danger btn-sm" title="delete">D</a>
                                    </td>
                                </tr>
                                @endforeach   
                            </tbody>
                        </table>
                    </div>
                </div>
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