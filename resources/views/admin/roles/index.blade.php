@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Datatables', true)
@section('content_header')
    <h2>Panel de Administracion de Roles</h2>
@stop

@section('content')
<div class="section-body">
    <div class="card-body">
    @can('crear-rol')
        <a href="{{route('admin.roles.create')}}" class="btn btn-warning">Nuevo Rol</a>
    @endcan
    <table class="table table-striped mt-2">
        <thead style="background-color: #6777ef;">
            <th style="color:#fff">Rol</th>
            <th style="color:#fff">Acciones</th>
        </thead>
        <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{$role->name}}</td>
                    <td>
                        @can('editar-rol')
                            <a class="btn btn-primary" href="{{route('admin.roles.edit',$role->id)}}">Editar</a>     
                        @endcan
                        @can('borrar-rol')
                            {!!Form::open (['method'=> 'DELETE', 'route'=> ['admin.roles.destroy',$role->id], 'style'=>'display:inline']) !!}
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