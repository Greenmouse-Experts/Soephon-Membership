@extends('layouts.admin_frontend')

@section('page-content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-4 mt-1">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <h4 class="font-weight-bold">Overview</h4>
                </div>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card bg-primary">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="">
                                        <h3 class="mb-2" style="color: #fff;">Total Members</h3>
                                        <div class="d-flex flex-wrap justify-content-start align-items-center">
                                            <h5 class="mb-0 font-weight-bold text-white">{{$members->count()}}</h5>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
               <div class="card">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                        <div class="">
                            <h3 class="mb-2" style="color: #dd127b;">Total Dues</h3>
                            <div class="d-flex flex-wrap justify-content-start align-items-center">
                               <h5 class="mb-0 font-weight-bold">{{$dues->count()}}</h5>
                            </div>                            
                        </div>
                     </div>
                  </div>
               </div>   
            </div>
            <div class="col-md-4">
               <div class="card">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                        <div class="">
                            <h3 class="mb-2" style="color: #dd127b;">Total Paid Dues</h3>
                            <div class="d-flex flex-wrap justify-content-start align-items-center">
                               <h5 class="mb-0 font-weight-bold">{{$paid_dues->count()}}</h5>
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
                            <h4 class="card-title">Latest Members</h4>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="table-color-heading">
                                    <tr class="text-dark">
                                        <th scope="col">S/N</th>
                                        <th scope="col">Membership ID</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Name</th>
                                    </tr>
                                </thead>
                                @foreach($fivemembers as $key => $fivemember)
                                <tbody>
                                    <tr class="white-space-no-wrap">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$fivemember->membership_id}}</td>
                                        <td>{{$fivemember->title}}</td>
                                        <td>{{$fivemember->first_name}} {{$fivemember->last_name}}</td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                            <div class="d-flex justify-content-end align-items-center border-top-table p-3">
                                <a href="{{route('admin.view.members')}}" class="btn btn-secondary btn-sm">See All</a>
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