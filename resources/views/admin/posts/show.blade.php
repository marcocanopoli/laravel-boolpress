@extends('layouts.back')
@section('content')
<div class="container mt-4">

    @if (session('created'))
        <div class="alert alert-success my-alert">
            Il post <strong>'{{ session('created') }}'</strong> e' stato creato con successo!
        </div>
    @elseif (session('updated'))
        <div class="alert alert-success my-alert">
            Il post <strong>'{{ session('updated') }}'</strong> e' stato modificato con successo!
        </div>    
    @endif

    <div class="row">
        <div class="blog-post">
            <h1 class="blog-post-title">{{ $post->title }}
                @if ($post->category)
                    <a class="badge badge-primary" href="{{ route('admin.categories.show', $post->category->id) }}">{{ $post->category->name }}</a>
                @endif            
            </h1>            
            <small class="blog-post-meta">posted {{ $post->created_at->format('d/m/Y') }} by <a href="">{{ $post->author }}</a></small>
            <div>
                @forelse ($post->tags as $tag)
                    <span class="badge badge-pill badge-purple">{{ $tag->name }}</span>
                @empty                    
                    <span class="badge badge-pill badge-dark">no tags assigned</span>
                @endforelse
            </div>
            <div class="my-2">
                <a class="btn btn-warning" href="{{ route('admin.posts.edit', $post->id) }}">EDIT</a>
                <a class="btn btn-secondary ml-2" href="{{ route('admin.posts.index') }}">ALL POSTS</a>
            </div>
            <div>
                <img src="{{ $post->imgUrl }}" alt="">
            </div>
            <div>{!! $post->content !!}</div>

        </div>
    </div>

</div>    
@endsection