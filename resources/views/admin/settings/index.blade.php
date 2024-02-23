@extends('adminlte::page')

@section('title', 'Settings')

@section('content_header')
<h1>Settings</h1>
@stop

@section('content')
<x-adminlte-card title="General Settings" theme="lightblue" icon="fas fa-cogs">
        <div class="w-50 mx-auto">
            {!! Form::open(['route' => 'admin.settings.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {!! Form::label('page_title', 'Page Title:') !!}
                {!! Form::text('page_title', isset($settings->page_title) ? $settings->page_title : null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('home_banner', 'Home Banner:') !!}
                {!! Form::file('home_banner', ['class' => 'form-control']) !!}
                @if(isset($settings->home_banner))
                    <img src="{{ asset($settings->home_banner) }}" alt="Home Banner" style="max-width: 200px;">
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('logo', 'Logo:') !!}
                {!! Form::file('logo', ['class' => 'form-control']) !!}
                @if(isset($settings->logo))
                    <img src="{{ asset($settings->logo) }}" alt="Logo" style="max-width: 200px;">
                @endif
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    {!! Form::label('header_color', 'Header Color:') !!}
                    {!! Form::color('header_color', isset($settings->header_color) ? $settings->header_color : null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group col-md-6">
                    {!! Form::label('footer_color', 'Footer Color:') !!}
                    {!! Form::color('footer_color', isset($settings->footer_color) ? $settings->footer_color : null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('socials_links_json', 'Social Media Links (JSON):') !!}
                {!! Form::textarea('socials_links_json', isset($settings->socials_links) ? $settings->socials_links : null, ['class' => 'form-control', 'rows' => 5]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('footer_links', 'Footer Links (JSON):') !!}
                {!! Form::textarea('footer_links', isset($settings->footer_links) ? $settings->footer_links : null, ['class' => 'form-control', 'rows' => 5]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('address', 'Business Address:') !!}
                {!! Form::text('address', isset($settings->address) ? $settings->address : null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email Address:') !!}
                {!! Form::email('email', isset($settings->email) ? $settings->email : null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('phone', 'Phone Number:') !!}
                {!! Form::tel('phone', isset($settings->phone) ? $settings->phone : null, ['class' => 'form-control']) !!}
            </div>

            <!-- Adaugă câmpuri pentru alte setări -->

            <div class="form-group">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </x-adminlte-card>

@stop