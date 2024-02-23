@extends('adminlte::page')

@section('title', 'Admin Dashboard')

@section('content_header')
<h1>Dashboard Admin</h1>
@stop

@section('content')
<div class="row">
    <div class="col-4">
        <x-adminlte-card title="Activity" theme="info" icon="fas fa-sync-alt" collapsible maximizable>
            <ul class="list-group">
                @if(count($activities) > 0)
                @foreach($activities as $activity)
                <li class="list-group-item">
                    @if(isset($activity->subject['title']))
                    {{ ucfirst($activity->description) }} {{ $activity->subject['title'] }}
                    <span class="float-right">{{ $activity->created_at->diffForHumans() }}</span>
                    @endif
                </li>
                @endforeach
                @else
                 <p>No activity</p>
                @endif

            </ul>
        </x-adminlte-card>
    </div>

    <div class="col-4">
        <x-adminlte-card title="Appointments" theme="info" icon="fas fa-calendar-check" collapsible maximizable>
        @foreach($appointments as $appointment)
            <div class="d-flex justify-content-between align-items-center mb-2">
                <a href="{{ route('admin.appointments.show', ['id' => $appointment->id]) }}" class="text-dark">
                    <i class="fa fa-eye fa-lg fa-fw mr-2"></i>
                    {{ $appointment->name }}
                </a>
                <span>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d-m-Y H:i') }}</span>
            </div>
            @endforeach
        </x-adminlte-card>
    </div>
    <div class="col-4">
        <x-adminlte-card title="Messages" theme="info" icon="fas fa-envelope-open-text" collapsible maximizable>
            @foreach($messages as $message)
            <div class="d-flex justify-content-between align-items-center mb-2">
                <a href="{{ route('admin.contact.show', ['id' => $message->id]) }}" class="text-dark">
                    <i class="fa fa-eye fa-lg fa-fw mr-2"></i>
                    {{ $message->subject }}
                </a>
                <span>{{ $message->time_diff }}</span>
            </div>
            @endforeach


        </x-adminlte-card>
    </div>
</div>
</div>


@stop