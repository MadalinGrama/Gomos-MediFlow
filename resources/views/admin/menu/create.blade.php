@extends('adminlte::page')

@section('title', 'Create Menu')

@section('content_header')
<h1>Menu</h1>
<div class="mt-2">
    <a href="{{ route('admin.menu.index') }}" class="btn btn-primary">
        <i class="fas fa-bars"></i> Back to all menu items</a>
</div>
@include('partials.sessions.messages')

@stop

@section('content')
<div class="container-fluid p-4 bg-white shadow">
    <h2>Add Item Menu</h2>

    {!! Form::open(['route' => 'admin.menu.store']) !!}

    <div class="form-group">
        {!! Form::label('title', 'Titlu:') !!}
        {!! Form::text('title', null, ['class' => 'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('url', 'URL:') !!}
        {!! Form::text('url', null, ['class' => 'form-control', 'required']) !!}
    </div>

    <div class="form-group">
    {!! Form::label('parent_id', 'Parent element (for dropdown):') !!}
    {!! Form::select('parent_id', $parentMenuItems, null, ['class' => 'form-control']) !!}
</div>




    {!! Form::button('<i class="far fa-save"></i> Save and back', ['type' => 'submit', 'class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
</div>
@stop