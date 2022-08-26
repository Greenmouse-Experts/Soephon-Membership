<div class="iq-top-navbar">
    <div class="iq-navbar-custom">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <div class="side-menu-bt-sidebar">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-secondary wrapper-menu" width="30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </div>
            <div class="d-flex align-items-center">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-list align-items-center">
                        <!-- <li class="nav-item nav-icon dropdown">
                            <a href="#" class="search-toggle dropdown-toggle" id="notification-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" class="h-6 w-6 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                                <span class="bg-primary"></span>
                            </a>
                            <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="notification-dropdown">
                                <div class="card shadow-none m-0 border-0">
                                    <div class="p-3 card-header-border">
                                        <h6 class="text-center">
                                            Notifications
                                        </h6>
                                    </div>
                                    <div class="card-body overflow-auto card-header-border p-0 card-body-list" style="max-height: 500px;">
                                        <ul class="dropdown-menu-1 overflow-auto list-style-1 mb-0">
                                            <li class="dropdown-item-1 float-none p-3">
                                                <div class="list-item d-flex justify-content-start align-items-start">
                                                    <div class="avatar">
                                                        <div class="avatar-img avatar-danger avatar-20">
                                                            <span>
                                                                <svg class="icon line" width="30" height="30" id="cart-alt1" stroke="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                    <path d="M3,3H5.32a1,1,0,0,1,.93.63L10,13,8.72,15.55A1,1,0,0,0,9.62,17H19" style="fill: none;stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path>
                                                                    <polyline points="10 13 18.2 13 21 6" style="fill: none;stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></polyline>
                                                                    <line x1="20.8" y1="6" x2="7.2" y2="6" style="fill: none;stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></line>
                                                                    <circle cx="10.5" cy="20.5" r="0.5" style="fill: none;stroke-miterlimit: 10; stroke-width: 2;"></circle>
                                                                    <circle cx="16.5" cy="20.5" r="0.5" style="fill: none;stroke-miterlimit: 10; stroke-width: 2;"></circle>
                                                                </svg>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="list-style-detail ml-2 mr-2">
                                                        <h6 class="font-weight-bold">Your order is placed</h6>
                                                        <p class="m-0">
                                                            <small class="text-secondary">If several languages coalesce</small>
                                                        </p>
                                                        <p class="m-0">
                                                            <small class="text-secondary">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="text-secondary mr-1" width="15" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                </svg>
                                                                3 hours ago</small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-footer text-muted p-3">
                                        <p class="mb-0 text-primary text-center font-weight-bold">Show all notifications</p>
                                    </div>
                                </div>
                            </div>
                        </li> -->
                        <li class="nav-item nav-icon dropdown">
                            <a href="#" class="nav-item nav-icon dropdown-toggle pr-0 search-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if(Auth::user()->avatar)
                                <img class="img-fluid avatar-rounded" width="20" src="/storage/avatars/{{Auth::user()->avatar}}" alt="Profile Picture">
                                @else
                                <img src="{{URL::asset('dash/assets/images/user/1.jpg')}}" alt="profile-bg" class="img-fluid avatar-rounded">
                                @endif
                                <span class="mb-0 ml-2 user-name" style="color: #fff;">{{Auth::user()->first_name}}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <li class="dropdown-item d-flex svg-icon">
                                    <svg class="svg-icon mr-0" id="h-01-p" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <a href="{{route('admin.profile')}}">My Profile</a>
                                </li>
                                <li class="dropdown-item  d-flex svg-icon border-top">
                                    <svg class="svg-icon mr-0" id="h-05-p" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    <a href="{{route('logout')}}">Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>