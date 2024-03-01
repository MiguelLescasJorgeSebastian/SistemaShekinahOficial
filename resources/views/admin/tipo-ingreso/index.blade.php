@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Datatables', true)
@section('content_header')
    <h2>Panel de Administracion de Tipos de Ingresos</h2>
@stop

@section('content')
<div class="section-body">
    <div class="card-body">
    @can('crear-ingreso')
        <a href="{{route('admin.tipo-ingresos.create')}}" class="btn btn-warning">Nuevo Tipo de Ingreso</a>
    @endcan
    <table class="table table-striped mt-2">
        <thead style="background-color: #6777ef;">
            <th style="color:#fff">Tipo de Ingreso</th>
            <th style="color:#fff">Acciones</th>
        </thead>
        <tbody>
            @foreach($tipoIngresos as $tipo)
                <tr>
                    <td>{{$tipo->nombre}}</td>
                    <td>
                        @can('editar-rol')
                            <a class="btn btn-primary" href="{{route('admin.tipo-ingresos.edit',$tipo->id)}}">Editar</a>     
                        @endcan
                        @can('borrar-rol')
                            {!!Form::open (['method'=> 'DELETE', 'route'=> ['admin.tipo-ingresos.destroy',$tipo->id], 'style'=>'display:inline']) !!}
                            {!!Form::submit('Eliminar',['class'=>'btn btn-danger']) !!}
                            {!!Form::close() !!}
                            
                        @endcan
                    </td>

                </tr>
            @endforeach
        </tbody>

    </table>
</div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop