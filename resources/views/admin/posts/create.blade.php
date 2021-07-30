@extends('layouts.back')
@section('content')
<div class="container">
    {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
    <form action="{{ route('admin.posts.store') }}" class="form" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Enter title" value="{{ old('title') }}">
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" placeholder="Enter author" value="{{ old('author') }}">
            @error('author')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                <option value="">-- Category --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" 
                        {{ ($category->id == old('category_id')) ? 'selected' : '' }}>
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
                <input class="form-check-input" type="checkbox" id="tag-{{ $tag->id }}" value="{{ $tag->id }}" name ="tags[]" 
                {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}
                >
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
            <label for="content">Content</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content"  rows="6" placeholder="Enter post content">{{ old('content') }}</textarea>
            @error('content')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-secondary ml-2" href="{{ route('admin.posts.index') }}">ALL POSTS</a>

    </form>
</div>
@endsection