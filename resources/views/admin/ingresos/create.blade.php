@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Datatables', true)
@section('content_header')
    <h1>Importar Ingresos</h1>
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
    <form action="{{ route('admin.ingresos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="documento">Importa tu Excel:</label>
            <input type="file" name="documento" id="documento" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Import</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop