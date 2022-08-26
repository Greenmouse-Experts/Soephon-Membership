@extends('layouts.admin_frontend')

@section('page-content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Add Due Plan</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.add.due')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" />
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="amount">Amount</label>
                                    <input type="number" class="form-control" id="amount" name="amount" />
                                </div>
                                <div class="col-12 form-group">
                                    <label for="description">Description</label>
                                    <textarea type="text" class="form-control" id="description" name="description" ></textarea>
                                </div>
                                <div class="col-12 form-group">
                                    <label for="validity">Validity</label>
                                    <select class="form-control" name="validity" required>
                                        <option>-- Select Validity --</option>
                                        <option value="1">Daily</option>
                                        <option value="7">Weekly</option>
                                        <option value="30">Monthly</option>
                                        <option value="90">Quarterly</option>
                                        <option value="180">Semi Annually</option>
                                        <option value="365">Annually</option>
                                        <option value="730">Biennially</option>
                                        <option value="1095">Triennially</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" style="width: 100%">
                                Add Due
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection