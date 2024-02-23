@extends('adminlte::page')

@section('title', 'Menu')

@section('content_header')
<h1>Menu</h1>
<div class="mt-2">
    <a href="{{ route('admin.menu.create') }}" class="btn btn-success">
        <i class="fas fa-plus"></i> Add menu item</a>
</div>
@include('partials.sessions.messages')

@stop

@section('content')
    <x-adminlte-card title="Menu Items" theme="lightblue" icon="fas fa-bars">
        <x-adminlte-datatable id="table1" :heads="['ID', 'Title', 'URL', 'Parent', 'Actions']" head-theme="dark" theme="warning" striped hoverable with-buttons>
            @foreach($menuItems as $menuItem)
            <tr>
                <td>{{ $menuItem->id }}</td>
                <td>{{ $menuItem->title }}</td>
                <td>{{ $menuItem->url }}</td>
                <td>
                    @if ($menuItem->parent_id)
                        {{ $menuItem->parent->title }}
                    @else
                        N/A
                    @endif
                </td>
                <td class="d-flex">
                    <a href="{{ route('admin.menu.edit', $menuItem->id) }}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editează Meniul">
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                    </a>
                    <form action="{{ route('admin.menu.destroy', $menuItem->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Șterge Meniul">
                            <i class="fa fa-lg fa-fw fa-trash"></i>
                        </button>
                    </form>

                    <x-adminlte-modal id="modalMin{{ $menuItem->id }}" title="Confirmare Ștergere" theme="danger" icon="fas fa-trash" static-backdrop>
                        <p>Ești sigur că vrei să ștergi acest meniu?</p>
                        <button class="btn btn-outline-light" data-dismiss="modal">Nu</button>
                        <button class="btn btn-outline-light" id="confirmDelete">Da, șterge</button>
                    </x-adminlte-modal>
                </td>
            </tr>
            <!-- Afișați elementele copil ale meniului -->
            @foreach ($menuItem->children as $child)
                <tr>
                    <td>{{ $child->id }}</td>
                    <td>{{ $child->title }}</td>
                    <td>{{ $child->url }}</td>
                    <td>{{ $menuItem->title }}</td> <!-- Afișați numele părintelui din elementul părinte -->
                    <td class="d-flex">
                        <a href="{{ route('admin.menu.edit', $child->id) }}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editează Meniul">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </a>
                        <form action="{{ route('admin.menu.destroy', $child->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Șterge Meniul">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>
                        </form>

                        <x-adminlte-modal id="modalMin{{ $child->id }}" title="Confirmare Ștergere" theme="danger" icon="fas fa-trash" static-backdrop>
                            <p>Ești sigur că vrei să ștergi acest meniu?</p>
                            <button class="btn btn-outline-light" data-dismiss="modal">Nu</button>
                            <button class="btn btn-outline-light" id="confirmDelete">Da, șterge</button>
                        </x-adminlte-modal>
                    </td>
                </tr>
            @endforeach
            @endforeach
        </x-adminlte-datatable>
    </x-adminlte-card>
@stop
