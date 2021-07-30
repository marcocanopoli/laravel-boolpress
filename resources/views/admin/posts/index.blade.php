@extends('layouts.back')
@section('content')
    <div class="container">
        @if (session('deleted'))
            <div class="alert alert-success">
               Il post <strong>'{{ session('deleted') }}'</strong> e' stato eliminato con successo!
            </div>            
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Slug</th>
                    <th>Created</th>
                    <th>Category</th>
                    <th>Tags</th>
                    <th colspan="3"></th>
                </tr>
            </thead>            
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->author }}</td>
                        <td>{{ $post->slug }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>
                            @if ($post->category)
                                {{ $post->category->name }}
                            @endif
                        </td>
                        <td>
                            @foreach ($post->tags as $tag)
                                <span class="badge badge-pill badge-purple">{{ $tag->name }}</span>
                            @endforeach
                        </td>
                        <td><a class="btn btn-primary" href="{{ route('admin.posts.show', $post->id)}}">SHOW</a></td>
                        <td><a class="btn btn-success" href="{{ route('admin.posts.edit', $post->id)}}">EDIT</a></td>
                        <td>
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post" onSubmit="return confirm('Sei sicuro di voler eliminare il post \'{{ $post->title }}\'?')">
                                @csrf
                                @method('DELETE')                                
                                <button type="submit" class="btn btn-danger">DELETE</button>                            
                            </form>
                        </td>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection