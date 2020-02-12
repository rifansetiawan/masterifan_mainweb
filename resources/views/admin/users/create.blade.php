@extends('layouts.admin')

@section('judul-card')
    <h2>Create Users</h2>
@endsection

@section('konten-admin')
    {!! Form::open(['method'=>'POST','action'=>'AdminUsersController@store']) !!}
    <div class="form-group">
        {!! Form::label('title','Title : ') !!}
        {!! Form::text('title',null, ['placeholder' => 'Input Title Here']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Submit') !!}
    </div>

    {!! Form::close() !!}
@endsection
