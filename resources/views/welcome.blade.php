<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php print (isset($title)) ? 'Soehpon | ' . $title : 'Soephon' ?></title>

    <link rel="icon" href="{{URL::asset('assets/images/logo/fav.png')}}" sizes="192x192">

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="{{URL::asset('assets/vendor/perfect-scrollbar.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{URL::asset('assets/css/light-fixed.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('assets/css/main.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('assets/css/custom.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('assets/css/responsive.css')}}" />

    <!-- Fix Footer CSS -->
    <link type="text/css" href="{{URL::asset('assets/vendor/fix-footer.css')}}" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="{{URL::asset('assets/css/material-icons.css')}}" rel="stylesheet">
    <link type="text/css" href="{{URL::asset('assets/css/material-icons.rtl.css')}}" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link type="text/css" href="{{URL::asset('assets/css/fontawesome.css')}}" rel="stylesheet">
    <link type="text/css" href="{{URL::asset('assets/css/fontawesome.rtl.css')}}" rel="stylesheet">

    <!-- Preloader -->
    <link type="text/css" href="{{URL::asset('assets/css/preloader.css')}}" rel="stylesheet">
    <link type="text/css" href="{{URL::asset('assets/css/preloader.rtl.css')}}" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="{{URL::asset('assets/css/app.css')}}" rel="stylesheet">
    <link type="text/css" href="{{URL::asset('assets/css/app.rtl.css')}}" rel="stylesheet">

    <link type="text/css" href="{{URL::asset('assets/css/light-fixed.css')}}" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/soephon.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/slick-theme.css')}}">

    <!-- import google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">

    <!-- axios progressbar loader -->
    <link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/rikmms/progress-bar-4-axios/0a3acf92/dist/nprogress.css" />
</head>

<body class="layout-navbar-mini-fixed-bottom">

    <!-- Header Layout -->


    <nav class="navbar navbar-expand-lg navbar-light bg-light container">
        <a class="navbar-brand my-2 " href="#">
            <img src="{{URL::asset('assets/images/logo/logo.png')}}" style="width: 10em;" alt="Soehpon" class="img-fluid" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <form class="form-inline">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 wh" style="background: #f2f3f5" placeholder="Search for courses" aria-label="Search" aria-describedby="basic-addon1" />
                        <div class="input-group-prepend">
                            <span class="input-group-text border-0 text-danger rounded-right" style="background: #f2f3f5" id="basic-addon1"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </form>
            </ul>
            <ul class="navbar-nav ml-auto">

                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>

        </div>
    </nav>

    <div class="bg-gradient-primary py-32pt p-100 mb-40">

        <div class="container page__container">
            <form method="POST" action="{{ route('member.login') }}" class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6 p-0 mx-auto" id="signin_form">
                @csrf
                <div class="">
                    <div class="card  border-0 py-3">
                        <div class="card-body">
                            <div class="mb-2">
                                @includeIf('layouts.error_template')
                            </div>
                            <h4 class="" style="color: #da147bbf;">Membership Sign In</h4>
                            <hr class="underline mb-4">

                            <div class="form-group">
                                <label>Member ID</label>
                                <input type="text" name="membership_id" class="form-control @error('membership_id') is-invalid @enderror" placeholder="Enter Member ID" value="{{ old('membership_id') }}" required autocomplete="membership_id" autofocus>
                                @error('membership_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                <input name="password" value="Password" hidden>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" style="width:200px;">Proceed to Login <i class="fa fa-angle-right" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <!-- <div class="js-fix-footer bg-white border-top-2">
        <div class="container page-section py-lg-48pt">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-6 col-md-4 mb-24pt mb-md-0">
                            <h4 class="text-70">Learn</h4>
                            <nav class="nav nav-links nav--flush flex-column">
                                <a class="nav-link" href="#">Courses</a>
                                <a class="nav-link" href="#">Explore</a>
                                <a class="nav-link" href="#">Learning Paths</a>
                            </nav>
                        </div>
                        <div class="col-6 col-md-4 mb-32pt mb-md-0">
                            <h4 class="text-70">Community</h4>
                            <nav class="nav nav-links nav--flush flex-column">
                                <a class="nav-link" href="#">FAQ</a>
                                <a class="nav-link" href="#">Contact</a>
                                <a class="nav-link" href="#">Student Profile</a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-md-right">
                    <p class="text-70 brand justify-content-md-end">
                        <img class="brand-icon" src="{{URL::asset('assets/images/logo/logo.png')}}" width="150" alt="Soehpon">
                    </p>
                    <p class="text-muted mb-0 mb-lg-16pt">Soehpon is an online learning platform that helps anyone achieve their personal and professional goals.</p>
                </div>
            </div>
        </div>
        <div class="bg-footer page-section py-lg-32pt">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-4 mb-24pt mb-md-0">
                        <p class="text-white-70 mb-8pt"><strong>Follow us</strong></p>
                        <nav class="nav nav-links nav--flush">
                            <a href="#" class="nav-link mr-8pt"><img src="{{URL::asset('assets/images/icon/footer/facebook-square%402x.png')}}" width="24" height="24" alt="Facebook"></a>
                            <a href="#" class="nav-link mr-8pt"><img src="{{URL::asset('assets/images/icon/footer/twitter-square%402x.png')}}" width="24" height="24" alt="Twitter"></a>
                            <a href="#" class="nav-link mr-8pt"><img src="{{URL::asset('assets/images/icon/footer/vimeo-square%402x.png')}}" width="24" height="24" alt="Vimeo"></a>
                            <a href="#" class="nav-link"><img src="{{URL::asset('assets/images/icon/footer/youtube-square%402x.png')}}" width="24" height="24" alt="YouTube"></a>
                        </nav>
                    </div>
                    <div class="col-md-4 text-md-right">
                        <p class="mb-8pt d-flex align-items-md-center justify-content-md-end">
                            <a href="#" class="text-white-70 text-underline mr-16pt">Terms</a>
                            <a href="#" class="text-white-70 text-underline">Privacy policy</a>
                        </p>
                        <p class="text-white-50 mb-0">Copyright 2019 &copy; All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    </div>

    </div>

</body>

</html>