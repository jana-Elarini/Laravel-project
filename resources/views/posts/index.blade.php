

@extends('layouts.main')

@section('title', 'All Articles')

@section('content')

<style>
  body {
    background: linear-gradient(to bottom, #f8f4f1, #ece0d1);
    font-family: 'Arial', sans-serif;
  }
  .card {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
    transition: 0.3s ease-in-out;
  }
  .card:hover {
    transform: translateY(-5px);
  }
  .card img {
    height: 200px;
    object-fit: cover;
  }
</style>

<div class="container mt-5">
  <h2 class="mb-4 text-center">All Articles</h2>
  <div class="row">
    @foreach($posts as $post)
      <div class="col-md-4 mb-4">
        <div class="card">
          
          @if($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="Post Image">
          @endif
          
          <div class="card-body">
  <h5 class="card-title">{{ $post->title }}</h5>
  <p class="card-text">{{ Str::limit($post->description, 100) }}</p>

  <a href="{{ route('posts.show', $post->id) }}" class="btn btn-dark">Read More</a>

  @if(auth()->check() && (auth()->user()->is_admin || $post->user_id === auth()->id()))
      <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
      
      <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-dark">Delete</button>
      </form>
  @endif
</div>

        </div>
      </div>
    @endforeach
  </div>
</div>

@endsection
