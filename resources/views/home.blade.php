@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard User</h1>
@stop

@section('content')
    <p>Welcome to this beautiful user panel.</p>
    <div class="container">
    @if(session('error'))
        <x-adminlte-callout theme="info" title="Info">
        {{ session('error') }}
        </x-adminlte-callout>
    @endif    
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
