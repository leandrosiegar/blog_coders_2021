@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Role</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            {{  session('info') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::model($role, array('route' => ['admin.roles.update', $role], 'files' => true, 'method' => 'PUT')) !!}
                @include('admin.roles.partials.form')
                {{ Form::submit('Editar role', array('type' => 'submit','class' => 'btn btn-primary', 'onclick' => '')) }}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
