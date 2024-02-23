@extends('adminlte::page')

@section('title', 'All Appointments')

@section('content_header')
<h1>Appointments</h1>
<div class="mt-2">
    <a href="" class="btn btn-success">
        <i class="fas fa-project-diagram"></i> CRM Record</a>
</div>
@include('partials.sessions.messages')
@stop

@section('content')
@php
    $heads = [
    'Name',
    'Email',
    'Phone',
    'Message',
    'Date',    
    'Actions',
    ];
    @endphp
    <x-adminlte-card title="All Appointments" theme="lightblue" icon="fas fa-calendar-alt">
    <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark" theme="warning" striped hoverable with-buttons>
            @foreach($appointments as $appointment)
            <tr>
                <td>{{ $appointment->name }}</td>
                <td>{{ $appointment->email }}</td>
                <td>{{ $appointment->phone }}</td>
                <td>{{ $appointment->message }}</td> 
                <td>{{ $appointment->appointment_date }}</td>                
                <td class="d-flex">
                    <!-- <a href="" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editează Pagina">
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                    </a> -->
                    <form action="{{ route('admin.appointment.destroy', $appointment->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete Appointment">
                            <i class="fa fa-lg fa-fw fa-trash"></i>
                        </button>
                    </form>

                    <x-adminlte-modal id="modalMin" title="Delete Confirmation" theme="danger" icon="fas fa-trash" static-backdrop>
                        <p>Are you sure you want to delete this Appointment?</p>
                        <button class="btn btn-outline-light" data-dismiss="modal">No</button>
                        <button class="btn btn-outline-light" id="confirmDelete">Yes, delete</button>
                    </x-adminlte-modal>


                    <a href="{{ route('admin.appointments.show', $appointment->id) }}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="View Appointment">
                        <i class="fa fa-lg fa-fw fa-eye"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </x-adminlte-datatable>
    </x-adminlte-card>
@stop
