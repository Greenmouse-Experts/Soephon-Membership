@extends('layouts.admin_frontend')

@section('page-content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Add Member</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.add.member')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" />
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name"/>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" />
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" />
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="number" class="form-control" id="phone_number" name="phone_number" />
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="occupation">Occupation</label>
                                    <input type="text" class="form-control" id="occupation" name="occupation"/>
                                </div>
                                <div class="col-12 form-group">
                                    <label for="address">Address</label>
                                    <textarea type="text" class="form-control" id="address" name="address" ></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" style="width: 100%">
                                Add Member
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection