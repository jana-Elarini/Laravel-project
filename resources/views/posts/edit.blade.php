@extends('layouts.main')

@section('title') Edit @endsection

@section('content')

<div class="container mt-5">
  <h2 class="mb-4">Edit Post</h2>

  <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Title</label>
        <input 
            name="title" 
            type="text" 
            value="{{ old('title', $post->title) }}" 
            class="form-control" 
            required>
    </div>

    <div class="mb-3">
        <label class="form-label">Article</label>
        <textarea 
            name="description" 
            class="form-control" 
            rows="8" 
            placeholder="Edit your Article..." 
            style="min-height:350px;" 
            required>{{ old('description', $post->description) }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Upload New Image (Optional)</label>
        <input type="file" name="image" class="form-control">

        @if($post->image)
          <p class="mt-2">Current Image:</p>
          <img src="{{ asset('images/' . $post->image) }}" class="img-fluid rounded" style="max-width: 200px;">
        @endif
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-dark">Update</button>
    </div>
  </form>
</div>

@endsection


