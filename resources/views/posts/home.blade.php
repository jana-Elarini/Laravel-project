@extends('layouts.main')

@section('title', 'Home')

@section('content')


@if(auth()->check() && auth()->user()->is_admin)
  <div id="admin-box" 
       style="position: fixed; bottom: 20px; right: 20px; background: #28a745; color: white; 
              padding: 12px 20px; border-radius: 10px; font-size: 16px; z-index: 2000; 
              box-shadow: 0px 4px 10px rgba(0,0,0,0.2);">
    Welcome Admin 🎉
  </div>
@endif

<script>
  document.addEventListener("DOMContentLoaded", function() {
    let box = document.getElementById("admin-box");
    if (box) {
      setTimeout(() => {
        box.style.transition = "opacity 1s ease";
        box.style.opacity = "0";
        setTimeout(() => box.remove(), 1000);
      }, 3000); 
    }
  });
</script>

<style>
  body {
    background: linear-gradient(to bottom, #e6d3c7, #f5e9df);
    font-family: 'Arial', sans-serif;
    padding-top: 70px; /* عشان نسيب مساحة للـ navbar */
  }

  .navbar {
    position: fixed; 
    top: 0; 
    left: 0; 
    width: 100%; 
    z-index: 1050; 
  }

  .hero-post {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    height: 500px;
  }
  .hero-post img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  .hero-post .overlay {
    position: absolute;
    bottom: 20px;
    left: 20px;
    color: white;
    max-width: 70%;
  }
  .hero-post .overlay h2 {
    font-size: 2.5rem;
    font-weight: bold;
  }
  .side-post {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    height: 240px;
    margin-bottom: 20px;
  }
  .side-post img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  .side-post .overlay {
    position: absolute;
    bottom: 15px;
    left: 15px;
    color: white;
  }
  .side-post .overlay h4 {
    font-size: 1.2rem;
    font-weight: bold;
  }
</style>

<div class="container mt-4">
  <div class="row">
    <!-- Big Hero Post -->
    <div class="col-md-8">
      <div class="hero-post">
        <img src="{{ asset('images/DISCIPLINE.jpg') }}" alt="Main Post">
        <div class="overlay">
          <h2>Discipline: The Key to Success</h2>
          <a href="{{ route('posts.show', 12) }}" class="btn btn-light mt-2">Read Article</a>
        </div>
      </div>
    </div>

    <!-- Side Small Posts -->
    <div class="col-md-4">
      <div class="side-post">
        <img src="{{ asset('images/fashion.jpg') }}" alt="Fashion Post">
        <div class="overlay">
          <h4>The Ever-Changing World of Fashion</h4>
          <a href="{{ route('posts.show', 11) }}" class="btn btn-sm btn-light mt-1">Read</a>
        </div>
      </div>

      <div class="side-post">
        <img src="{{ asset('images/flutter-hero.jpg') }}" alt="Flutter Post">
        <div class="overlay">
          <h4>Flutter: Building Beautiful Apps Faster</h4>
          <a href="{{ route('posts.show', 10) }}" class="btn btn-sm btn-light mt-1">Read</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Floating Create Article Button -->
<a href="{{ route('posts.create') }}" 
   class="btn shadow-lg"
   style="position: fixed; bottom: 30px; left: 30px; background-color: #8B5E3C; color: white; border-radius: 8px; padding: 12px 25px; font-size: 18px; z-index: 1000;">
   Create Article
</a>

@endsection
