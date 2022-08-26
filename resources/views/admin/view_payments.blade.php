@extends('layouts.admin_frontend')

@section('page-content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Payment Histories</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table data-table table-striped table-bordered dataTable" role="grid" aria-describedby="datatable_info">
                                <thead>
                                    <tr role="row">
                                        <th class="pr-0">S/N</th>
                                        <th>Due Title</th>
                                        <th>Amount</th>
                                        <th>Transaction ID</th>
                                        <th>Ref ID</th>
                                        <th>Paid At</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                @if($payments->isEmpty())
                                <tbody>
                                    <tr>
                                        <td class="align-enter text-dark font-15" colspan="7">No Payment History.</td>
                                    </tr>
                                </tbody>
                                @else
                                @foreach($payments as $key => $payment)
                                <tbody>
                                    <tr>
                                        <td class="pr-0">{{$loop->iteration}}</td>
                                        <td>{{$payment->due_title}}</td>
                                        <td class="text-black">₦{{number_format($payment->amount, 2)}}</td>
                                        <td class="text-black">{{$payment->transaction_id}}</td>
                                        <td class="text-black">{{$payment->ref_id}}</td>
                                        <td class="text-black">{{$payment->paid_at}}</td>
                                        <td class="text-white bg-success">{{$payment->status}}</td>
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