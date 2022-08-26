@extends('layouts.admin_frontend')

@section('page-content')
<div class="content-page">
<div class="container-fluid">
   <div class="row">
      <div class="col-lg-4">
         <div class="card card-block p-card">
            <div class="profile-box">
               <div class="profile-card rounded">
                    @if(Auth::user()->avatar)
                    <img class="avatar-100 rounded d-block mx-auto img-fluid mb-3" width="20" src="/storage/avatars/{{Auth::user()->avatar}}" alt="Profile Picture">
                    @else
                    <img src="{{URL::asset('dash/assets/images/user/1.jpg')}}" alt="profile-bg" class="avatar-100 rounded d-block mx-auto img-fluid mb-3">
                    @endif
                    <h3 class="font-600 text-white text-center mb-0" style="z-index: 10000">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h3>
                    <p class="text-white text-center mb-5">{{Auth::user()->user_type}}</p>
               </div>
               <div class="mt-5">
                    <form method="POST" action="{{ route('admin.upload-avatar', Crypt::encrypt(Auth::user()->id))}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 form-group">
                                <label for="avatar">Profile Picture</label>
                                <input type="file" class="form-control" id="avatar" name="avatar" />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" style="width: 100%">
                            Upload Profile Picture
                        </button>
                    </form>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-8">
         <div class="card card-block">
            <div class="card-header d-flex justify-content-between pb-0">
               <div class="header-title">
                  <h4 class="card-title mb-0">Profile</h4>
               </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Update Profile</h6>
                        <form method="POST" action="{{ route('admin.profile.update',  Crypt::encrypt(Auth::user()->id))}}">
                            @csrf
                            <div class="row">
                                <div class="col-12 form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{Auth::user()->first_name}}"/>
                                </div>
                                <div class="col-12 form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{Auth::user()->last_name}}" />
                                </div>
                                <div class="col-12 form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{Auth::user()->email}}"/>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" style="width: 100%">
                                Update Profile
                            </button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <h6>Update Password</h6>
                        <form method="POST" action="{{ route('admin.update.password', Crypt::encrypt(Auth::user()->id))}}">
                            @csrf
                            <div class="row">
                                <div class="col-12 form-group">
                                    <label for="password">Old Password</label>
                                    <input type="password" class="form-control" id="old_password" name="password" value="{{Auth::user()->password}}" readonly/>
                                </div>
                                <div class="col-12 form-group">
                                    <label for="new_password">New Password</label>
                                    <input type="password" class="form-control" id="new_password" name="new_password"/>
                                </div>
                                <div class="col-12 form-group">
                                    <label for="new_password_confirmation">Confirm New Password</label>
                                    <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" />
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" style="width: 100%">
                                Update Password
                            </button>
                        </form>
                    </div>
                </div>
            </div>
         </div>
      </div>
   </div>
</div>
      </div>
@endsection