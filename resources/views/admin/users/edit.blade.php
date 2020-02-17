@extends('layouts.admin')

@section('judul-card')
    <h2>Edit User</h2>
@endsection

@section('konten-admin')


    <div class="row">
        <div class="col-sm-3">
            <br>
            @if ($user->photos_id)
            <img height="300" src="{{$user->photo->file}}" alt="" class="img-responsive img-rounded" >
            @else
            <img src="http://placehold.it/400x400" alt="" class="img-responsive img-rounded">
            @endif

        </div>
        <div class="col-sm-9">
            {!! Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id],'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('name','Name : ') !!}
                {!! Form::text('name',null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email','Email : ') !!}
                {!! Form::email('email',null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('role_id','Role : ') !!}
                {!! Form::select('role_id',[''=>'Choose Options']+$role,null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('is_active','Status : ') !!}
                {!! Form::select('is_active',array(1=>'Active',0=>'Not Active'),null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password','Password : ') !!}
                {!! Form::password('password',['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('photos_id','Photo : ') !!}
                {!! Form::file('photos_id', null,['class'=>'form-control']) !!}
            </div>

            <div class="row float-right">
                <div class="col-sm-5">
                    {!! Form::submit('Edit User', ['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
                <div class="col-sm-5">
                    {!! Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id]]) !!}
                    {!! Form::submit('Delete User', ['class'=>'btn btn-danger myWish']) !!}
                    {!! Form::close() !!}
                </div>
            </div>

        </div>


    </div>
    @include('includes.error_form')
@endsection
