@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Create Profile</h4>
                </div>
                <div class="content">
                    {{ Form::model($user, ['route' => 'admins.store', 'role' => 'form']) }}
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    {{ Form::label('name', 'Name') }}
                                    {{ Form::text('name','',['class'=>'form-control border-input']) }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('email', 'Email address') }}
                                    {{ Form::email('email','',['class'=>'form-control border-input']) }}
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            {{ Form::submit('Save Profile', ['class' => 'btn btn-info btn-fill btn-wd']) }}
                        </div>
                    <div class="clearfix"></div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
