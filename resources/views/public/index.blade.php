@extends('layout.master')
@section('title','Home Page')
@section('content')
<div class="jumbotron image d-flex justify-content-center align-items-center">
  <h1 class="display-4">Blog</h1>
</div>
<div class="container">
  <div class="row">
    @foreach($posts as $post)
    <div class="col-md-4">
      <div class="card">
        <img class="card-img-top" src="{{ asset('image')}}/{{$post->image}}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title text-center">{{ $post->title }}</h5>
          <p class="card-text lead">
            @if(strlen($post->content)>150)
            {{ substr($post->content,0,150) }} ...
            <br>
            <a href="{{ route('blog', $post->id) }}" class="btn btn-primary"><i class="fa fa-book"></i> Read more</a>
            <br>
            Posted By 
            <a href="{{route('author', $post->user_id)}}"> {{ $post->user->name }}</a>
            <br>
            Category: 
            <a href="{{route ('sortCategory', $post->category_id)}}">{{ $post->category->name}}</a>
            @else
            {{ $post->content }}
            <br>
            Posted By 
            <a href="{{route('author', $post->user_id)}}"> {{ $post->user->name }}</a>
            <br>
            Category: 
            <a href="{{route ('sortCategory', $post->category_id)}}">{{ $post->category->name}}</a>
            @endif
          </p>
        </div>
      </div>
    </div>
  @endforeach
  </div>
</div>
@endsection()