@extends('layouts.app')
@section('content')
<div class="container my-4">
    <div class="row">
        <div class="blog-post">
            <h1 class="blog-post-title">{{ $post->title }}</h1>
            <small class="blog-post-meta">posted {{ $post->created_at->format('d/m/Y') }} by <a href="">{{ $post->author }}</a></small>
            <p>{{ $post->content }}</p>
        </div>
    </div>
</div>    
@endsection