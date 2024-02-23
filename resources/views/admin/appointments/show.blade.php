@extends('adminlte::page')

@section('title', 'Patients Appointment')

@section('content_header')
<h1>Patients Appointments</h1>
<div class="mt-2">
    <a href="{{ route('admin.appointments.index') }}" class="btn btn-primary">
        <i class="fas fa-calendar-alt"></i> All Appointments
    </a>
</div>
@include('partials.sessions.messages')
@stop

@section('content')

<x-adminlte-card title="{{ $appointment->name }} ⤑ {{ $appointment->appointment_date }}" theme="lightblue" icon="fas fa-envelope">
    <div class="d-flex flex-row">
        <p><i class="fas fa-user"></i> {{ $appointment->name }}</p>
        <p class="ml-2"><i class="fas fa-phone"></i> {{ $appointment->phone }}</p>
        <p class="ml-2"><i class="fas fa-at"></i> {{ $appointment->email }}</p>
    </div>
    <p><i class="fas fa-comment-dots"></i> {{ $appointment->message }}</p>
    <div class="mt-2 d-flex flex-row">
        <div class="mr-2">
            <a href="{{ route('admin.contact.index') }}" class="btn btn-success">
                <i class="fas fa-project-diagram"></i> CRM Sync</a>
        </div>
        <div class="mr-2">
            <a href="tel:{{ $appointment->phone }}" class="btn btn-primary">
                <i class="fas fa-phone"></i> Call</a>
        </div>
        <div class="mr-2">
            <a href="mailto:{{ $appointment->email }}" class="btn btn-primary">
                <i class="fas fa-envelope"></i> Reply</a>
        </div>
    </div>
</x-adminlte-card>

@stop