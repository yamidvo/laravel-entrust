@extends('layouts.layout_base')
 
@section('title')
    editar usuarios
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
        {{ Form::Model($user, array('method' => 'PUT', 'route' => array('users.update', $user->id), 'class' => 'form-horizontal col-md-6')) }}
        
        <div class="form-group">
            {{Form::label('first_name', 'Nombre');}}
            {{Form::text('first_name', null, array('class' => 'form-control'));}}
        </div>
        <div class="form-group">
            {{Form::label('last_name', 'Apellido');}}
            {{Form::text('last_name', null,array('class' => 'form-control'));}}
        </div>
        <div class="form-group">
            {{Form::label('username', 'Username');}}
            {{Form::text('username', null,array('class' => 'form-control', 'autocomplete' => 'off'));}}
            </div>
        <div class="form-group">
            {{Form::label('role', 'Rol');}}
            {{ Form::select('rol', $roles , $user->rol->id, array('class' => 'form-control')) }}
        
        </div>
        <div class="form-group">
            {{Form::label('email', 'Email');}}
            {{ Form::email('email', null, array('class' => 'form-control')); }}
        </div>
        <div class="form-group">
            {{Form::label('password', 'Password');}}
            {{ Form::password('password', array('class' => 'form-control')) }}
        </div>
            {{ Form::submit('Editar', array('class' => 'btn btn-success')) }}
        {{ Form::close() }}
    </div>
</div>
@stop