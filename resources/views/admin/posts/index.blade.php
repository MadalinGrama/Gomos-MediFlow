@extends('adminlte::page')

@section('title', 'Posts⤑ Admin Dashboard')

@section('content_header')
    <h1>Posts</h1>
    <div class="mt-2">
        <a href="{{ route('admin.posts.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Add Post</a>
    </div>
    @include('partials.sessions.messages')
@stop

@section('content')
    @php
        $heads = [
            'ID',
            'Title',
            'Meta Title',
            'Slug',
            'Meta Description',
            'Meta Keywords',
            'Short Description',
            'Content',
            'Thumbnail',
            'Categories',
            'Actions',
        ];
    @endphp

    {{-- Display the data --}}
    <x-adminlte-card title="All Posts" theme="lightblue" icon="far fa-fw fa-file">
        <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark" theme="warning" striped hoverable with-buttons>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->meta_title }}</td>
                    <td>{{ $post->slug }}</td>
                    <td>{{ $post->meta_description }}</td>
                    <td>{{ $post->meta_keywords }}</td>
                    <td>{{ $post->short_description }}</td>
                    <td>{{ strlen($post->content) > 40 ? substr($post->content, 0, 40).'...' : $post->content }}</td>
                    <td><img src="{{ asset('storage/'.$post->thumbnail) }}" alt="{{ $post->title }}" class="img-fluid" style="max-width: 100px;"></td>
                    <td>
                        @foreach ($post->categories as $category)
                            <span class="badge bg-primary">{{ $category->name }}</span>
                        @endforeach
                    </td>
                    <td class="d-flex">
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit Post">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </a>
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete Post">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>
                        </form>

                        <x-adminlte-modal id="modalMin" title="Delete Confirmation" theme="danger" icon="fas fa-trash" static-backdrop>
                            <p>Are you sure you want to delete this post?</p>
                            <button class="btn btn-outline-light" data-dismiss="modal">No</button>
                            <button class="btn btn-outline-light" id="confirmDelete">Yes, delete</button>
                        </x-adminlte-modal>

                        <a href="{{ route('admin.posts.show', $post->slug) }}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="View Post">
                            <i class="fa fa-lg fa-fw fa-eye"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </x-adminlte-datatable>
    </x-adminlte-card>
@stop
