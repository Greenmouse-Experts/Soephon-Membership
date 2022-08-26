@extends('layouts.dashboard_frontend')

@section('page-content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-4 mt-1">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <h4 class="font-weight-bold">Overview</h4>
                </div>
            </div>
            <div class="col-md-6">
               <div class="card">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                        <div class="">
                            <h3 class="mb-2" style="color: #dd127b;">Dues</h3>
                            <div class="d-flex flex-wrap justify-content-start align-items-center">
                               <h5 class="mb-0 font-weight-bold">{{$dues->count()}}</h5>
                            </div>                            
                        </div>
                     </div>
                  </div>
               </div>   
            </div>
            <div class="col-md-6">
               <div class="card">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                        <div class="">
                            <h3 class="mb-2" style="color: #dd127b;">My Dues</h3>
                            <div class="d-flex flex-wrap justify-content-start align-items-center">
                               <h5 class="mb-0 font-weight-bold">{{$my_dues->count()}}</h5>
                            </div>                            
                        </div>
                     </div>
                  </div>
               </div>   
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">My Latest Paid Dues</h4>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="table-color-heading">
                                    <tr class="text-dark">
                                        <!-- <th scope="col">S/N</th>
                                        <th scope="col">Due ID</th> -->
                                        <th scope="col">Due Title</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                @foreach($paid_dues as $key => $paid_due)
                                <tbody>
                                    <tr class="white-space-no-wrap">
                                        <!-- <td>{{$loop->iteration}}</td>
                                        <td>{{$paid_due->due_id}}</td> -->
                                        <td>{{$paid_due->due_title}}</td>
                                        <td>₦{{number_format($paid_due->amount, 2)}}</td>
                                        <td>
                                            <p class="mb-0 text-success d-flex justify-content-start align-items-center">
                                                <small><svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="18" viewBox="0 0 24 24" fill="none">
                                                        <circle cx="12" cy="12" r="8" fill="#3cb72c"></circle>
                                                    </svg>
                                                </small> {{$paid_due->status}}
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                            <div class="d-flex justify-content-end align-items-center border-top-table p-3">
                                <a href="{{route('my.dues')}}" class="btn btn-secondary btn-sm">See All</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
</div>
@endsection