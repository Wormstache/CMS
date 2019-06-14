@extends('layout.master')
@section('title','Dashboard')
@section('content')
<div class="jumbotron image d-flex justify-content-center align-items-center">
  <h1 class="display-4">Dashboard</h1>
</div>
  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto">
        @if($errors->any())
          @foreach($errors->all() as $error)
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $error }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endforeach
        @endif
        <form action="{{ route('task.update', $posts->id) }}" method="post" enctype="multipart/form-data">
          <input type="hidden" name="_method" value="PATCH">
          {{ csrf_field() }}
          <div class="col-lg-8 mx-auto text-center">
            <a href="{{ route('blogs') }}" class="btn btn-info" role="button" >View More</a>
          </div>
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" value="{{ $posts->title }}">
          </div>
          <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" rows="10">{{ $posts->content }}</textarea>
          </div>
          <div class="form-group">
            <label for="image">Choose image:</label>
            <input type="file" name="image">
          </div>
          <div class="form-group">
            <input type="submit" value="Submit" class="btn btn-secondary">
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection()