@extends('adminlte::page')

@section('title', 'Pages⤑ Admin Dashboard')

@section('css')

@stop


@section('content_header')
<h1>Pages</h1>
<div class="mt-2">
    <a href="{{ route('admin.pages.create') }}" class="btn btn-success">
        <i class="fas fa-plus"></i> Add page</a>
</div>

@include('partials.sessions.messages')

@stop

@section('content')
    @php
    $heads = [
    'ID',
    'Title',
    'Name',
    'Slug',
    'Meta Title',
    'Meta Description',
    'Meta Keywords',
    'Content',
    'Template',
    'Actions',
    ];
    @endphp

    {{-- Afișează datele--}}
    <x-adminlte-card title="All pages" theme="lightblue" icon="far fa-fw fa-file ">
        <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark" theme="warning" striped hoverable with-buttons>
            @foreach($pages as $page)
            <tr>
                <td>{{ $page->id }}</td>
                <td>{{ $page->title }}</td>
                <td>{{ $page->name }}</td>
                <td>{{ $page->slug }}</td>
                <td>{{ $page->meta_title }}</td>
                <td>{{ $page->meta_description }}</td>
                <td>{{ $page->meta_keywords }}</td>
                <td>{{ strlen($page->content) > 40 ? substr($page->content, 0, 40).'...' : $page->content }}</td>
                <td>{{ $page->template }}</td>
                <td class="d-flex">
                    <a href="{{ route('admin.pages.edit', $page->id) }}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editează Pagina">
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                    </a>
                    <form action="{{ route('admin.pages.destroy', $page->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Șterge Pagina">
                            <i class="fa fa-lg fa-fw fa-trash"></i>
                        </button>
                    </form>

                    <x-adminlte-modal id="modalMin" title="Delete Confirmation" theme="danger" icon="fas fa-trash" static-backdrop>
                        <p>Are you sure you want to delete this page?</p>
                        <button class="btn btn-outline-light" data-dismiss="modal">No</button>
                        <button class="btn btn-outline-light" id="confirmDelete">Yes, delete</button>
                    </x-adminlte-modal>


                    <a href="{{ route('admin.pages.show', $page->slug) }}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Vezi Pagina">
                        <i class="fa fa-lg fa-fw fa-eye"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </x-adminlte-datatable>
    </x-adminlte-card>

<script></script>


@stop