@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="header">
                    {{ Breadcrumbs::render('admins.create') }}
                    <h4 class="title">@lang('admin/main.create')</h4>
                </div>
                <div class="content">
                    {{ Form::model($user, ['route' => 'admins.store', 'role' => 'form']) }}
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    {{ Form::label('name', __('admin/main.name')) }}
                                    {{ Form::text('name',null,['class'=>'form-control border-input']) }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('email', __('admin/main.email')) }}
                                    {{ Form::email('email',null,['class'=>'form-control border-input']) }}
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            {{ Form::submit(__('admin/main.save'), ['class' => 'btn btn-info btn-fill btn-wd']) }}
                        </div>
                    <div class="clearfix"></div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
