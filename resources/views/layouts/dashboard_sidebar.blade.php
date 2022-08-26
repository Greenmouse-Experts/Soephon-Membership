<div class="iq-sidebar  sidebar-default  ">
    <div class="iq-sidebar-logo d-flex align-items-end justify-content-between">
        <a href="index.html" class="header-logo">
            <img src="{{URL::asset('assets/images/logo.png')}}" class="img-fluid rounded-normal light-logo" alt="logo">
        </a>
        <div class="side-menu-bt-sidebar-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-light wrapper-menu" width="30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </div>
    </div>
    <div class="data-scrollbar" data-scroll="1">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="side-menu">
                <li class="active sidebar-layout" style="border-top: 1px solid #dd127b;">
                    <a href="{{route('home')}}" class="svg-icon">
                        <i class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </i>
                        <span class="ml-2">Dashboard</span>
                    </a>
                </li>
                <li class="px-3 pt-3 pb-2 ">
                    <span class="text-uppercase small font-weight-bold">Application</span>
                </li>
                <li class=" sidebar-layout">
                    <a href="{{route('my.dues')}}" class="svg-icon">
                        <i class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </i>
                        <span class="ml-2">My Dues</span>
                    </a>
                </li>
                <li class=" sidebar-layout">
                    <a href="{{route('dues')}}" class="svg-icon">
                        <i class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </i>
                        <span class="ml-2">Dues</span>
                    </a>
                </li>
                <li class=" sidebar-layout">
                    <a href="{{route('payment.history')}}" class="svg-icon">
                        <i class="">
                            <svg class="icon line" width="18" id="receipt" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M17,16V3L13,5,10,3,7,5,3,3V17.83A3.13,3.13,0,0,0,5.84,21,3,3,0,0,0,9,18V17a1,1,0,0,1,1-1H20a1,1,0,0,1,1,1v1a3,3,0,0,1-3,3H6" style="fill: none; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path>
                                <line x1="8" y1="10" x2="12" y2="10" style="fill: none; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></line>
                            </svg>
                        </i>
                        <span class="ml-2">Payment History</span>
                    </a>
                </li>
                <li class=" sidebar-layout">
                    <a href="{{route('profile')}}" class="svg-icon">
                        <i class="">
                            <svg class="svg-icon" id="iq-user-1-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </i><span class="ml-2">Profile</span>
                    </a>
                </li>
                <li class=" sidebar-layout">
                    <a href="{{route('logout')}}" class="svg-icon">
                        <i class="">
                            <svg class="svg-icon mr-0 text-secondary" id="h-05-p" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                        </i><span class="ml-2">Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="pt-5 pb-5"></div>
    </div>
</div>