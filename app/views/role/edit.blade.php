@extends('layouts.layout_base')
 
@section('title')
    crear usuarios
@stop

@section('head')
    @parent
    	<style>
            .role{
                margin-top: 60px;
            }
        </style>	
@stop

@section('content')
<div class="container">
    <div class="role">
        {{ Form::Model($role, array('method' => 'PUT', 'route' => array('roles.update', $role->id),             'class' => 'form-horizontal col-md-6')) }}
        
        <div class="form-group">
            {{Form::label('name', 'Nombre');}}
            {{Form::text('name', null, array('class' => 'form-control'));}}
        </div>
            {{ Form::submit('Editar', array('class' => 'btn btn-success')) }}
            {{ Form::close() }}
        {{ Form::close() }}
    </div>
</div>
@stop