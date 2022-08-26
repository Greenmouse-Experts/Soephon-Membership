<footer class="iq-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
            </div>
            <div class="col-lg-6 text-right">
                <span class="mr-1">
                    Copyright
                    <script>
                        document.write(new Date().getFullYear())
                    </script>© <a href="#" class="">{{config('app.name')}}</a>
                    All Rights Reserved.
                </span>
            </div>
        </div>
    </div>
</footer>

<!-- Alerts  Start-->
<div style="position: fixed; top: 15px; right: 10px; z-index: 100000; width: auto;">
    @include('layouts.alert')
</div>
<!-- Alerts End -->