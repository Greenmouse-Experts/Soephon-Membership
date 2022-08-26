@extends('layouts.admin_frontend')

@section('page-content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">View Dues</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table data-table table-striped table-bordered dataTable" role="grid" aria-describedby="datatable_info">
                                <thead>
                                    <tr role="row">
                                        <th class="pr-0">S/N</th>
                                        <th>Title</th>
                                        <th>Amount</th>
                                        <th>Description</th>
                                        <th>Validity</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @if($dues->isEmpty())
                                <tbody>
                                    <tr>
                                        <td class="align-enter text-dark font-15" colspan="7">No Due Added.</td>
                                    </tr>
                                </tbody>
                                @else
                                @foreach($dues as $key => $due)
                                <tbody>
                                    <tr>
                                        <td class="pr-0">{{$loop->iteration}}</td>
                                        <td>{{$due->title}}</td>
                                        <td class="text-black">₦{{number_format($due->amount, 2)}}</td>
                                        <td class="text-black">{{$due->description}}</td>
                                        <td class="text-black">
                                            @if($due->validity == 1)
                                            Daily
                                            @elseif($due->validity == 7)
                                            Weekly
                                            @elseif($due->validity == 30)
                                            Monthly
                                            @elseif($due->validity == 90)
                                            Quarterly
                                            @elseif($due->validity == 180)
                                            Semi Annually
                                            @elseif($due->validity == 365)
                                            Annually
                                            @elseif($due->validity == 730)
                                            Biennially
                                            @elseif($due->validity == 1095)
                                            Triennially
                                            @endif
                                        </td>
                                        <td>{{$due->created_at->diffForHumans()}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <button data-toggle="modal" data-target="#delete-{{$due->id}}" class="btn btn-danger mr-2">Delete Due</button>
                                                <!-- modal -->
                                                <div class="modal fade" id="delete-{{$due->id}}" tabindex="-1" role="dialog" aria-labelledby="defaultModal" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">
                                                                    Delete {{$due->title}}
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <span style="color: #000">Are you sure, you want to delete this Due?</span>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                                    Close
                                                                </button>
                                                                <a href="{{ route('admin.delete.due', Crypt::encrypt($due->id)) }}" class="btn btn-success">Delete Due</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection