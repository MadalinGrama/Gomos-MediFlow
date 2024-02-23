@extends('adminlte::page')

@section('title', 'Inbox Messages')

@section('content_header')
<h1>Inbox</h1>
<div class="mt-2">
    <a href="" class="btn btn-success">
        <i class="fas fa-cogs"></i> Settings Contact</a>
</div>
@include('partials.sessions.messages')
@stop

@section('content')
@php
    $heads = [
    'Name',
    'Email',
    'Subject',
    'Message',    
    'Actions',
    ];
    @endphp
    <x-adminlte-card title="Messages received" theme="lightblue" icon="fas fa-bars">
    <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark" theme="warning" striped hoverable with-buttons>
            @foreach($messages as $message)
            <tr>
                <td>{{ $message->name }}</td>
                <td>{{ $message->email }}</td>
                <td>{{ $message->subject }}</td>
                <td>{{ $message->message }}</td>                
                <td class="d-flex">
                    <!-- <a href="" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editează Pagina">
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                    </a> -->
                    <form action="{{ route('admin.contact.destroy', $message->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete message">
                            <i class="fa fa-lg fa-fw fa-trash"></i>
                        </button>
                    </form>

                    <x-adminlte-modal id="modalMin" title="Delete Confirmation" theme="danger" icon="fas fa-trash" static-backdrop>
                        <p>Are you sure you want to delete this page?</p>
                        <button class="btn btn-outline-light" data-dismiss="modal">No</button>
                        <button class="btn btn-outline-light" id="confirmDelete">Yes, delete</button>
                    </x-adminlte-modal>


                    <a href="{{ route('admin.contact.show', $message->id) }}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="View message">
                        <i class="fa fa-lg fa-fw fa-eye"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </x-adminlte-datatable>
    </x-adminlte-card>
@stop
