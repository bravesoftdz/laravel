@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-md-5">
                <div class="card card-user">
                <div class="image">
                    <img src="{{ asset('adminka/img/background.jpg') }}" alt="..."/>
                </div>
                <div class="content">
                    <div class="author">
                        <img class="avatar border-white" src="{{ asset('adminka/img/faces/face-2.jpg') }}" alt="..."/>
                        <h4 class="title">{{ $user->name }}<br />
                            <a href="#"><small>{{ '@ID = '.$user->id }}</small></a>
                        </h4>
                    </div>
                    <p class="description text-center">
                        "{{ $user->email }}"
                    </p>
                </div>
                <hr>
                <div class="text-center">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1">
                            <h5>12<br /><small>Files</small></h5>
                        </div>
                        <div class="col-md-4">
                            <h5>2GB<br /><small>Used</small></h5>
                        </div>
                        <div class="col-md-3">
                            <h5>24,6$<br /><small>Spent</small></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-7">
            <div class="card">
                <div class="header">
                    {{ Breadcrumbs::render('admins.edit', $user->id) }}
                    <h4 class="title">Edit Profile</h4>
                </div>
                <div class="content">
                    {{ Form::model($user, ['method' => 'PUT', 'route' => ['admins.update', $user->id]]) }}
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    {{ Form::label('id', 'ID') }}
                                    {{ Form::text('id',null,['class'=>'form-control border-input', 'disabled' => 'disabled']) }}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {{ Form::label('name', 'Name') }}
                                    {{ Form::text('name',null,['class'=>'form-control border-input']) }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('email', 'Email address') }}
                                    {{ Form::email('email',null,['class'=>'form-control border-input']) }}
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            {{ Form::submit('Edit Profile', ['class' => 'btn btn-info btn-fill btn-wd']) }}
                        </div>
                    <div class="clearfix"></div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
