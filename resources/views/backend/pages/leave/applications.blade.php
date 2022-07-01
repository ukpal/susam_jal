@extends('backend.layouts.default')
@section('page_title', 'Dashboard')
@section('content')

<style>
    .disabled-link {
      pointer-events: none;
    }
</style>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Leave Applications
                    @if (Session::has('success'))
                    <span class="text-success">>{{ Session::get('success') }}</span>
                    @endif
                    <a href="{{url('new-leave-application')}}" class="float-end btn btn-primary">New Application</a>
                </h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Description</th>
                        <th>Adjustment</th>
                        <th>Status</th>
                        <th>Comment</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->start_date}}</td>
                            <td>{{$item->end_date}}</td>
                            <td>{{$item->description}}</td>
                            <td>{{$item->adjustment}}</td>
                            <td>
                                @if ($item->status=='pending')
                                <span class="badge rounded-pill bg-warning">pending</span>
                                @elseif($item->status=='approved')
                                <span class="badge rounded-pill bg-success">approved</span>
                                @else
                                <span class="badge rounded-pill bg-danger">rejected</span>
                                @endif
                            </td>
                            <td>{{$item->comment}}</td>
                            <td>
                                {{-- <a href="{{url('edit-leave-application/'.encrypt($item->id))}}" class="btn btn-primary btn-sm" title="edit">E</a> --}}
                                <a href="{{url('delete-leave-application/'.encrypt($item->id))}}" onclick="return confirm('Are you sure to delete this data ?')" class="btn btn-danger btn-sm {{($item->status!='pending') ? 'disabled-link' : ''}}" title="delete">D</a>
                            </td> 
                        </tr>
                    @endforeach
                </table>
                
            </div>
        </div>
    </div>
</div>

@stop