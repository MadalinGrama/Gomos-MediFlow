@extends('adminlte::page')

@section('title', 'View Message')

@section('content_header')
<h1>Inbox</h1>
<div class="mt-2">
    <a href="" class="btn btn-success">
        <i class="fas fa-cogs"></i> Settings Contact
    </a>
</div>
@include('partials.sessions.messages')
@stop

@section('content')

<x-adminlte-card title="{{ $messages->subject }} ⤑ {{ $messages->created_at->format('Y-m-d H:i:s') }}" theme="lightblue" icon="fas fa-envelope">
    <div class="d-flex flex-row">
    <p><i class="fas fa-user"></i> {{ $messages->name }}</p>
    <p class="ml-2"><i class="fas fa-at"></i> {{ $messages->email }}</p>
    </div>
    <p><i class="fas fa-comment-dots"></i> {{ $messages->message }}</p>
    <div class="mt-2 d-flex flex-row">
        <div class="mr-2">
            <a href="{{ route('admin.contact.index') }}" class="btn btn-primary">
                <i class="fas fa-envelope"></i> All messages</a>
        </div>
        <div class="ml-2">
            <a href="mailto:{{ $messages->email }}" class="mr-2 btn btn-primary">
                <i class="fas fa-reply"></i> Reply</a>
        </div>

    </div>
</x-adminlte-card>

@stop