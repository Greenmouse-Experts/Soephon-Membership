@extends('layouts.admin_frontend')

@section('page-content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">View Members</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table data-table table-striped table-bordered dataTable" role="grid" aria-describedby="datatable_info">
                                <thead>
                                    <tr role="row">
                                        <th class="pr-0">S/N</th>
                                        <th>Membership ID</th>
                                        <th>Title</th>
                                        <th>Name</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @if($members->isEmpty())
                                <tbody>
                                    <tr>
                                        <td class="align-enter text-dark font-15" colspan="6">No Member Added.</td>
                                    </tr>
                                </tbody>
                                @else
                                @foreach($members as $key => $member)
                                <tbody>
                                    <tr>
                                        <td class="pr-0">{{$loop->iteration}}</td>
                                        <td>{{$member->membership_id}}</td>
                                        <td class="text-black">{{$member->title}}</td>
                                        <td class="text-black">{{$member->first_name}} {{$member->last_name}}</td>
                                        <td>{{$member->created_at->diffForHumans()}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <!-- <button data-toggle="modal" data-target="#send-message-{{$member->id}}" class="btn btn-primary mr-2">Send Message</button> -->
                                                <!-- Modal -->
                                                <!-- <div class="modal fade" id="send-message-{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-right" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">
                                                                    Send message to {{$member->membership_id}}
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST" action="{{ route('admin.message.member', Crypt::encrypt($member->id)) }}">
                                                                    @csrf
                                                                    <div class="form-group text-left">
                                                                        <label for="subject">Subject</label>
                                                                        <input type="text" class="form-control" id="subject" name="subject" />
                                                                    </div>
                                                                    <div class="form-group text-left">
                                                                        <label for="message">Message</label>
                                                                        <textarea type="text" class="form-control" id="message" rows="5" name="message"></textarea>
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary" style="width: 100%">
                                                                        Send Message
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->

                                                <button data-toggle="modal" data-target="#view-member-{{$member->id}}" class="btn btn-secondary mr-2">View/Edit</button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="view-member-{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-right" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit {{$member->membership_id}}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST" action="{{ route('admin.update.member', Crypt::encrypt($member->id)) }}">
                                                                    @csrf
                                                                    <div class="form-group text-left">
                                                                        <label for="title">Title</label>
                                                                        <input type="text" class="form-control" id="title" name="title" value="{{$member->title}}" />
                                                                    </div>
                                                                    <div class="form-group text-left">
                                                                        <label for="first_name">First Name</label>
                                                                        <input type="text" class="form-control" id="last_name" name="first_name" value="{{$member->first_name}}" />
                                                                    </div>
                                                                    <div class="form-group text-left">
                                                                        <label for="last_name">Last Name</label>
                                                                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{$member->last_name}}" />
                                                                    </div>
                                                                    <div class="form-group text-left">
                                                                        <label for="email">Email</label>
                                                                        <input type="email" class="form-control" id="email" name="email" value="{{$member->email}}" />
                                                                    </div>
                                                                    <div class="form-group text-left">
                                                                        <label for="phone_number">Phone Number</label>
                                                                        <input type="number" class="form-control" id="phone_number" name="phone_number" value="{{$member->phone_number}}" />
                                                                    </div>
                                                                    <div class="form-group text-left">
                                                                        <label for="address">Address</label>
                                                                        <textarea type="text" class="form-control" id="address" name="address" value="{{$member->address}}">{{$member->address}}</textarea>
                                                                    </div>
                                                                    <div class="form-group text-left">
                                                                        <label for="occupation">Occupation</label>
                                                                        <input type="text" class="form-control" id="occupation" name="occupation" value="{{$member->occupation}}" />
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary" style="width: 100%">
                                                                        Update
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button data-toggle="modal" data-target="#delete-{{$member->id}}" class="btn btn-danger mr-2">Delete Account</button>
                                                <!-- modal -->
                                                <div class="modal fade" id="delete-{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="defaultModal" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">
                                                                    Delete {{$member->title}} {{$member->first_name}} {{$member->last_name}}
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <span style="color: #000">Are you sure, you want to delete this member?</span>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                                    Close
                                                                </button>
                                                                <a href="{{ route('admin.delete.member', Crypt::encrypt($member->id)) }}" class="btn btn-success">Delete</a>
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