@extends('backend.layouts.default')
@section('page_title', 'Dashboard')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-3">Sub Divisions</h5>
                
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
                        <form action="{{url('sub-division')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id">
                            <div class="mb-3">
                                <label class="form-label">Sub Division Name:</label>
                                <input type="text" class="form-control" name="name"  required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">District:</label>
                                <select class="form-select" name="district_id" required>
                                    <option selected value="null">--- select ---</option>
                                    @foreach ($dists as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-primary clr-btn">Clear</button>
                        </form>
                    </div>
                    <div class="col-md-8">
                        <table id="table_id" class="display">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>District</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subd as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->district}}</td>
                                    <td>
                                        <a data-subd='[{{$item->id}},"{{$item->name}}","{{$item->district_id}}"]' class="btn btn-primary btn-sm edit-btn" title="edit">E</a>
                                        <a href="{{url('delete-sub-division/'.encrypt($item->id))}}" onclick="return confirm('Are you sure to delete this data ?')" class="btn btn-danger btn-sm" title="delete">D</a>
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
        $('.edit-btn').click(function(){
            var data=$(this).data('subd');
            $("input[name='id']").val(data[0]);
            $("input[name='name']").val(data[1]);
            $("select[name='district_id']").val(data[2]).change();
        });
        $('.clr-btn').click(function(){
            $("input[name='id']").val('');
            $("input[name='name']").val('');
            $("select[name='district_id']").val('').change();
        });
    } );
</script>
    
@endsection