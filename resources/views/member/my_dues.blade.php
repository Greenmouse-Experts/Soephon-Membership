@extends('layouts.dashboard_frontend')

@section('page-content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">My Dues</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table data-table table-striped table-bordered dataTable" role="grid" aria-describedby="datatable_info">
                                <thead>
                                    <tr role="row">
                                        <th class="pr-0">S/N</th>
                                        <th>Due ID</th>
                                        <th>Due Title</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                @if($my_dues->isEmpty())
                                <tbody>
                                    <tr>
                                        <td class="align-enter text-dark font-15" colspan="5">No Dues.</td>
                                    </tr>
                                </tbody>
                                @else
                                @foreach($my_dues as $key => $my_due)
                                <tbody>
                                    <tr>
                                        <td class="pr-0">{{$loop->iteration}}</td>
                                        <td>{{$my_due->due_id}}</td>
                                        <td>{{$my_due->due_title}}</td>
                                        <td class="text-black">₦{{number_format($my_due->amount, 2)}}</td>
                                        <td class="text-white bg-success">{{$my_due->status}}</td>
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