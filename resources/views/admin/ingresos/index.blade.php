@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Datatables', true)
@section('content_header')
    <h1>Finanzas</h1>
@stop

@section('content')
<div class="section-body">
    <div class="card-body">
    @can('crear-ingreso')
    <a class="btn btn-warning" href="{{route('admin.ingresos.create')}}">Importar Ingresos</a>
    @endcan
    @can('crear-ingreso')
    <a class="btn btn-info" href="{{route('admin.tipo-ingresos.index')}}">Ver Tipos de Ingresos</a>  
    @endcan
    <table class="table table-striped mt-2">
        <thead style="background-color: #6777ef;">
            <th style="display: none;">ID</th>
            <th style="color:#fff">Nombre</th>
            <th style="color:#fff">Monto</th>
            <th style="color:#fff">Tipo Ingreso</th>
            <th style="color:#fff">Fecha</th>
        </thead>
        <tbody>
            @foreach($ingresos as $ingreso)
                <tr>
                    <td style="display: none;">{{$ingreso->id}}</td>
                    <td>{{$ingreso->nombre}}</td>
                    <td>{{$ingreso->monto}}</td>
                    <td>
                        @if (!empty($ingreso->tipoIngreso))
                            <h5><span class="badge badge-dark">{{$ingreso->tipoIngreso->nombre}}</span></h5>
                        @endif
                    </td>
                    <td>
                        @if (now()->diffInWeeks($ingreso->created_at) == 0)
                            {{$ingreso->created_at->isoFormat('dddd')}}
                        @else
                            {{$ingreso->created_at->format('Y-m-d')}}
                        @endif
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