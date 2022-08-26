<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{config('app.name')}} | Admin Dashboard</title>

    <!-- Favicon -->
    <link rel="icon" href="{{URL::asset('assets/images/logo/fav.png')}}" sizes="192x192">

    <link rel="stylesheet" href="{{URL::asset('dash/assets/css/backend-plugin.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('dash/assets/css/backende209.css?v=1.0.0')}}">

    <script type="text/javascript">
        window.setTimeout(function() {
            $(".alert-timeout").fadeTo(500, 0).slideUp(1000, function() {
                $(this).remove();
            });
        }, 11000);
    </script>
</head>

<body class="  ">
    <div class="wrapper">
        <div class="container">
            <div class="row no-gutters height-self-center">
                <div class="col-sm-12 text-center align-self-center">
                    <div class="iq-error position-relative">
                        <img src="{{Url::asset('dash/assets/images/error/Datum_500.png')}}" class="img-fluid iq-error-img iq-error-img-dark mx-auto" alt="">
                        <img src="{{Url::asset('dash/assets/images/error/Datum_500.png')}}" class="img-fluid iq-error-img mb-0" alt="">
                        <h2 class="mb-0">Oops! This Page is Not Found.</h2>
                        <p>The requested page dose not exist.</p>
                        <a class="btn btn-primary d-inline-flex align-items-center mt-3" href="/"><i class="ri-home-4-line mr-2"></i>Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Backend Bundle JavaScript -->
    <script src="{{URL::asset('dash/assets/js/backend-bundle.min.js')}}"></script>
    <!-- Chart Custom JavaScript -->
    <script src="{{URL::asset('dash/assets/js/customizer.js')}}"></script>

    <script src="{{URL::asset('dash/assets/js/sidebar.js')}}"></script>

    <!-- Flextree Javascript-->
    <script src="{{URL::asset('dash/assets/js/flex-tree.min.js')}}"></script>
    <script src="{{URL::asset('dash/assets/js/tree.js')}}"></script>

    <!-- Table Treeview JavaScript -->
    <script src="{{URL::asset('dash/assets/js/table-treeview.js')}}"></script>

    <!-- SweetAlert JavaScript -->
    <script src="{{URL::asset('dash/assets/js/sweetalert.js')}}"></script>

    <!-- Vectoe Map JavaScript -->
    <script src="{{URL::asset('dash/assets/js/vector-map-custom.js')}}"></script>

    <!-- Chart Custom JavaScript -->
    <script src="{{URL::asset('dash/assets/js/chart-custom.js')}}"></script>
    <script src="{{URL::asset('dash/assets/js/charts/01.js')}}"></script>
    <script src="{{URL::asset('dash/assets/js/charts/02.js')}}"></script>

    <!-- slider JavaScript -->
    <script src="{{URL::asset('dash/assets/js/slider.js')}}"></script>

    <!-- Emoji picker -->
    <script src="{{URL::asset('dash/assets/vendor/emoji-picker-element/index.js')}}" type="module"></script>


    <!-- app JavaScript -->
    <script src="{{URL::asset('dash/assets/js/app.js')}}"></script>
</body>

</html>