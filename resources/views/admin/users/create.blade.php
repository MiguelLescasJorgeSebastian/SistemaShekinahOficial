@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Datatables', true)
@section('content_header')
    <h1>Registro de Usuarios</h1>
@stop

@section('content')
    @if ($errors->any())
        <div class="alert alert-dark alert-dismissible fade show"  role="alert">
            <strong>Whoops! Hubo algunos problemas con su entrada.</strong>
                @foreach ($errors->all() as $error)
                    <span class="badge badge-danger">{{$error}}</span>
                @endforeach
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    @endif
    <div class="">
        {!!Form::open(['route'=>['admin.users.store'], 'method'=>'post'  ]) !!}
        <div class="form-group">
            {!!Form::label('name','Nombre') !!}
            {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre del usuario']) !!}
        </div>
        <div class="form-group">
            {!!Form::label('email','Email') !!}
            {!!Form::email('email',null,['class'=>'form-control','placeholder'=>'Ingrese el email del usuario']) !!}
        </div>
        <div class="form-group">
            {!!Form::label('password','Contraseña') !!}
            {!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingrese la contraseña del usuario']) !!}
        </div>
        <div class="form-group">
            {!!Form::label('confirm-password','Confirmar Contraseña') !!}
            {!!Form::password('confirm-password',['class'=>'form-control','placeholder'=>'Confirme la contraseña del usuario']) !!}
        </div>
        <div class="form-group">
            {!!Form::label('roles','Roles') !!}
            {!!Form::select('roles[]',$roles,null,['class'=>'form-control']) !!}
        </div>
        {!!Form::submit('Guardar',['class'=>'btn btn-primary']) !!}
        {!!Form::close() !!}
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop