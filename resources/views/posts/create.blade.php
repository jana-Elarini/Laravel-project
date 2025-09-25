@extends('layouts.main')

@section('title') Create @endsection

@section('content')

    <div class="container mt-5">
        <h2 class="mb-4">Create Post</h2>

        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        
        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input name="title" type="text" class="form-control" value="{{ old('title') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Article</label>
                <textarea 
                    name="description" 
                    class="form-control" 
                    rows="8"
                    placeholder="Write your Article..." 
                    style="min-height:350px;" 
                    required>{{ old('description') }}</textarea>
            </div>


                
    <div class="mb-3">
        <label class="form-label">Upload Image</label>
        <input type="file" name="image" class="form-control">
    </div>



      
            

            <div class="text-center">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>

@endsection
