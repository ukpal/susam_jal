@extends('backend.layouts.default')
@section('page_title', 'Dashboard')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-3">Districts</h5>
                
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
                        <form action="{{url('district')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id">
                            <div class="mb-3">
                                <label class="form-label">District Name:</label>
                                <input type="text" class="form-control" name="name"  required>
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dist as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        <a data-district='[{{$item->id}},"{{$item->name}}"]' class="btn btn-primary btn-sm edit-btn" title="edit">E</a>
                                        <a href="{{url('delete-district/'.encrypt($item->id))}}" onclick="return confirm('Are you sure to delete this data ?')" class="btn btn-danger btn-sm" title="delete">D</a>
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
            var data=$(this).data('district');
            $("input[name='id']").val(data[0]);
            $("input[name='name']").val(data[1]);
        });
        $('.clr-btn').click(function(){
            $("input[name='id']").val('');
            $("input[name='name']").val('');
        });
    } );
</script>
    
@endsection