@extends('layouts.layout_base')
 
@section('title')
    crear usuarios
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
        {{ Form::open(array('method' => 'POST', 'route' => array('users.store'), 'class' => 'form-horizontal col-md-6')) }}
        
        <div class="form-group">
            {{Form::label('first_name', 'Nombre');}}
            {{Form::text('first_name', '',array('class' => 'form-control'));}}
        </div>
        <div class="form-group">
            {{Form::label('last_name', 'Apellido');}}
            {{Form::text('last_name', '',array('class' => 'form-control'));}}
        </div>
        <div class="form-group">
            {{Form::label('username', 'Username');}}
            {{Form::text('username', '',array('class' => 'form-control', 'autocomplete' => 'off'));}}
        </div>
        <div class="form-group">
            {{Form::label('role', 'Rol');}}
            {{ Form::select('rol', $roles, null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{Form::label('email', 'Email');}}
            {{ Form::email('email', null, array('class' => 'form-control')); }}
        </div>
        <div class="form-group">
            {{Form::label('password', 'Password');}}
            {{ Form::password('password', array('class' => 'form-control')) }}
        </div>
            {{ Form::submit('Crear', array('class' => 'btn btn-success')) }}
        {{ Form::close() }}
    </div>
</div>
@stop