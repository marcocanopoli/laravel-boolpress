@extends('layouts.app')
@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Slug</th>
                    <th>Created</th>
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
                        <td><a class="btn btn-success" href="{{ route('admin.posts.show', $post->id)}}">SHOW</a></td>
                        <td><a class="btn btn-primary" href="{{ route('admin.posts.edit', $post->id)}}">EDIT</a></td>
                        <td><a class="btn btn-danger" href="">DELETE</a></td>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection