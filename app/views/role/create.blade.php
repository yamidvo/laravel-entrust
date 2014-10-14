@extends('layouts.layout_base')
 
@section('title')
    crear roles
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
        {{ Form::open(array('method' => 'POST', 'route' => array('roles.store'), 'class' => 'form-horizontal col-md-6')) }}
        
        <div class="form-group">
            {{Form::label('name', 'Nombre');}}
            {{Form::text('name', '',array('class' => 'form-control'));}}
        </div>
            {{ Form::submit('Crear', array('class' => 'btn btn-success')) }}
        {{ Form::close() }}
    </div>
</div>
@stop