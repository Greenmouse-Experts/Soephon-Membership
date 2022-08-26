@if($errors->any())
    @foreach($errors->all() as $error)
    <div class="col-12 mb-2">
        <div class="alert alert-danger alert-timeout" role="alert">
            <div class="iq-alert-icon">
                <i class="ri-information-line"></i>
            </div>
            <div class="iq-alert-text">{{$error}}!</div>
        </div>
    </div>
    @endforeach
@endif

@if(session()->has('type'))
<div class="col-12 mb-2">
    <div class="alert alert-{{session()->get('type')}} alert-timeout" role="alert">
        <div class="iq-alert-icon">
            <i class="ri-alert-line"></i>
        </div>
        <div class="iq-alert-text">{{session()->get('message')}}</div>
    </div>
</div>
@endif