@extends('layouts.back')
@section('content')
<div class="container">
    <h1 class="my-4">Modifica del post: <br><span class="text-info">{{ $post->title }}</span></h1>
    {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="title" class="font-weight-bold">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Enter title" value="{{ $post->title }}">
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group" class="font-weight-bold">
            <label for="author" class="font-weight-bold">Author</label>
            <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" placeholder="Enter author" value="{{ $post->author }}">
            @error('author')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="category_id" class="font-weight-bold">Category</label>
            <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                <option value="">-- Category --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" 
                        {{ ($category->id == old('category_id', $post->category_id)) ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            @foreach ($tags as $tag)
            <div class="form-check form-check-inline">
                @if ($errors->any())
                    <input class="form-check-input" type="checkbox" id="tag-{{ $tag->id }}" value="{{ $tag->id }}" name ="tags[]" 
                    {{ in_array($tag->id, old('tags', $post->tags)) ? 'checked' : '' }}>  
                @else  
                    <input class="form-check-input" type="checkbox" id="tag-{{ $tag->id }}" value="{{ $tag->id }}" name ="tags[]"
                    {{ $post->tags->contains($tag->id) ? 'checked' : '' }}>           
                @endif
                <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
            </div>
            @endforeach            
            @error('tags')
                <div>
                    <small class="text-danger">{{ $message }}</small>
                </div>
            @enderror 
        </div>

        <div class="form-group">
            @if ($post->cover)
                <span class="font-weight-bold">Cover image</span>
                <img class="post-cover-img" src="{{ asset('storage/' . $post->cover) }}" alt="">
            @endif
            <label for="cover" class="font-weight-bold">Upload cover image (5MB max)</label>
            <input type="file" class="form-control-file @error('cover') is-invalid @enderror" id="cover" name="cover">
            @error('cover')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <div class="form-check form-check-inline"> 
                <input class="form-check-input" type="checkbox" id="delete-cover" name ="delete-cover">
                <label class="form-check-label" for="delete-cover">Delete cover image</label>
            </div>          
            @error('delete-cover')
                <small class="text-danger">{{ $message }}</small>
            @enderror 
        </div>

        <div class="form-group">
            <label for="content" class="font-weight-bold">Content</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content"  rows="6" placeholder="Enter post content">{{ $post->content }}</textarea>
            @error('content')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a class="btn btn-secondary ml-2" href="{{ route('admin.posts.index') }}">ALL POSTS</a>

    </form>
</div>
@endsection