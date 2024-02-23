@extends('adminlte::page')

@section('title', 'Add Post⤑ Admin Dashboard')

@section('content_header')
<h1>Add Post</h1>
<div class="mt-2">
    <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">
        <i class="far fa-file"></i> Back to all posts</a>
</div>
@include('partials.sessions.messages')

@stop

@section('content')
<div class="container-fluid p-4 bg-white shadow">
    @section('plugins.Summernote', true)
    {!! Form::open(['route' => 'admin.posts.store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
    @csrf
    <div class="mb-2">
        <div class="row mb-2">
            <div class="col">
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'Enter title']) !!}
            </div>
            <div class="col">
                {!! Form::label('meta_title', 'Meta Title') !!}
                {!! Form::text('meta_title', old('meta_title'), ['class' => 'form-control', 'placeholder' => 'Enter meta title']) !!}
            </div>
        </div>
        <div class="row mb-2">
            <div class="col">
                {!! Form::label('slug', 'Slug') !!}
                {!! Form::text('slug', old('slug'), ['class' => 'form-control', 'placeholder' => 'Auto-generated if left empty']) !!}
            </div>
            <div class="col">
                {!! Form::label('short_description', 'Short Description') !!}
                {!! Form::text('short_description', old('short_description'), ['class' => 'form-control', 'placeholder' => 'Enter short description']) !!}
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col">
            {!! Form::label('categories', 'Categories') !!}
            {!! Form::select('categories[]', $categories, old('categories'), ['class' => 'form-control select2', 'multiple' => 'multiple', 'data-placeholder' => 'Select categories', 'style' => 'width: 100%;']) !!}
        </div>
        <div class="col">
            {!! Form::label('thumbnail', 'Thumbnail') !!}
            {!! Form::file('thumbnail', ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="mb-2">
        <div class="row">
            <div class="col">
                {!! Form::label('content', 'Content') !!}
                @php
                $config = [
                "height" => "150",
                "toolbar" => [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
                ],
                ];
                @endphp
                <x-adminlte-text-editor name="content" class="'form-control'" igroup-size="sm" placeholder="Enter some content here..." :config="$config">
                    {{ old('content') }}
                </x-adminlte-text-editor>
            </div>
        </div>
    </div>

    <!-- Add other fields here -->
    {!! Form::button('<i class="far fa-save"></i> Save and back', ['type' => 'submit', 'class' => 'btn btn-success']) !!}
    {!! Form::close() !!}

</div>
@stop
