@extends('adminlte::page')

@section('title', 'Edit Menu')

@section('content_header')
    <h1>Edit Menu</h1>
    <div class="mt-2">
        <a href="{{ route('admin.menu.index') }}" class="btn btn-primary">
            <i class="fas fa-bars"></i> Back to all menu items</a>
    </div>
@include('partials.sessions.messages')

@stop

@section('content')
    <div class="container-fluid p-4 bg-white shadow">
        <h2>Edit Item Menu</h2>

        {!! Form::model($menuItem, ['route' => ['admin.menu.update', $menuItem->id], 'method' => 'PUT']) !!}

        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
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

        {!! Form::button('<i class="far fa-save"></i> Save Changes', ['type' => 'submit', 'class' => 'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>
@stop
