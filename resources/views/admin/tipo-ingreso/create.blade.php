@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Datatables', true)
@section('content_header')
    <h1>Creación de Tipos de Ingresos</h1>
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
        {!!Form::open(['route'=>['admin.tipo-ingresos.store'], 'method'=>'post'  ]) !!}
        <div class="form-group">
            {!!Form::label('nombre','Nombre del Tipo de Ingreso') !!}
            {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre del tipo']) !!}
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