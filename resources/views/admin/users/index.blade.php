@extends('adminlte::page')

@section('title', 'Usuarios')

@section('plugins.Datatables', true)
@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')
<div class="section-body">
    <div class="card-body">
    @can('crear-usuario'     )
    <a class="btn btn-warning" href="{{route('admin.users.create')}}">Nuevo Usuario</a>
    @endcan
    @can('ver-rol')
    <a class="btn btn-info" href="{{route('admin.roles.index')}}">Ver Roles</a>  
    @endcan
    <table class="table table-striped mt-2">
        <thead style="background-color: #6777ef;">
            <th style="display: none;">ID</th>
            <th style="color:#fff">Nombre</th>
            <th style="color:#fff">Email</th>
            <th style="color:#fff">Rol</th>
            <th style="color:#fff">Acciones</th>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td style="display: none;">{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if (!empty($user->getRoleNames()))
                            @foreach ($user->getRoleNames() as $rolName)
                            <h5><span class="badge badge-dark">{{$rolName}}</span></h5> 
                            @endforeach                                                   
                        @endif
                    </td>
                    <td>
                        @can('editar-usuario'     )
                            <a class="btn btn-info" href="{{route('admin.users.edit',$user->id)}}">Editar</a>
                        @endcan
                        @can('eliminar-usuario'     )
                            {!!Form::open (['method'=> 'DELETE', 'route'=> ['admin.users.destroy',$user->id], 'style'=>'display:inline']) !!}
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