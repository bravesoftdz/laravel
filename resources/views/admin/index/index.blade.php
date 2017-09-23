@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="admin-list">
                    <div class="header">
                        <div class="row">
                            <div class="col-md-10">
                                <h4 class="title">Adminka</h4>
                                <p class="category"></p>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <div class="col-md-10">
                            <a href="{{ route('admin.slider') }}" type="button" class="btn btn-outline-primary">@lang('admin/main.slider')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
