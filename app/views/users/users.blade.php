@extends('layouts.layout_base')
 
@section('title')
    users
@stop

@section('head')
    @parent
    	<style>
            .user{
                margin-top: 60px;
            }
        </style>	
@stop

@section('content')
<div class="container">
    <div class="user">
        @if(Entrust::can('crear_usuarios'))
        {{ Form::open(array('method' 
                            => 'get', 'route' => array('users.create'))) }}
                            {{ Form::submit('Crear', array('class'
                        => 'btn btn-success')) }}
                        {{ Form::close() }}
        @endif
        <table class="table table-hover">
            <thead>
                <tr><th>Username</th><th>Rol</th><th>Email</th><th>Nombre</th><th>Apellido</th></tr>
            </thead>
            @if(isset($users))
                <tbody>
                @foreach($users as $user)
                    <tr><td>{{ $user->username }}</td>
                        <td>{{ $user->rol->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->first_name }}</td><td>{{ $user->last_name  }}</td>
                        @if(Entrust::can('editar_usuarios'))
                            <td>{{ Form::open(array('method' 
                            => 'GET', 'route' => array('users.edit', $user->id))) }}
                            {{ Form::submit('Editar', array('class'
                        => 'btn btn-info')) }}
                        {{ Form::close() }}</td>
                        @endif
                        @if(Entrust::can('eliminar_usuarios'))
                        <td>
                            {{ Form::open(array('method' 
                            => 'DELETE', 'route' => array('users.destroy', $user->id))) }}
                            {{ Form::submit('Eliminar', array('class'
                        => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                        @endif
                    </tr>
                @endforeach
                    </tbody>
            @endif
        </table>
    </div>
</div>
@stop