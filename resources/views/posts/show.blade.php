@extends('layouts.main')

@section('title', 'Post Details')

@section('content')
<style>
  body {
    background: linear-gradient(to bottom, #f8f4f1, #ece0d1);
    /*linear-gradient(to bottom, #f5e6da, #f9f5f0); /* بيج فاتح */
  }

  .post-container {
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    padding: 30px;
    margin: 40px auto;
    max-width: 900px;
  }

  .post-title {
    font-size: 1.8rem;
    font-weight: bold;
    margin-bottom: 15px;
    color: #333;
  }

  .post-description {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #555;
    margin-bottom: 25px;
  }

  .post-meta {
    background: #fafafa;
    border-radius: 10px;
    padding: 15px;
    font-size: 0.95rem;
    color: #666;
  }

  .btn-back {
    background: #222;
    color: #fff;
    border-radius: 8px;
    padding: 8px 20px;
    text-decoration: none;
  }

  .btn-back:hover {
    background: #444;
    color: #fff;
  }
</style>

<div class="post-container">
    <h2 class="post-title">{{ $post->title }}</h2>
    <p class="post-description">{{ $post->description }}</p>

    <div class="post-meta">
        <p><strong>Posted By:</strong> {{ $post->user?->name ?? 'Unknown' }}</p>
        <p><strong>Email:</strong> {{ $post->user?->email ?? 'N/A' }}</p>
        <p><strong>Created At:</strong> {{ $post->created_at->format('l jS \\of F Y h:i:s A') }}</p>
    </div>

    <div class="mt-3">
        <a href="{{ route('posts.index') }}" class="btn-back">← Back to Posts</a>
    </div>
</div>
@endsection


