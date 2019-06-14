@extends('layout.master')
@section('title','Search')
@section('content')
@if (count($posts) === 0)
<div class="card border-danger mb-3 mx-auto error_card" style="max-width: 18rem;">
  <div class="card-header text-center text-danger"><h4><i class="fa fa-exclamation-circle"></i> Error <i class="fa fa-exclamation-circle"></i></h4></div>
  <div class="card-body text-danger">
    <h5 class="card-title text-center">The content you are searching for could not be found</h5>
  </div>
</div>  
@else
@foreach ($posts as $post)
<div class="col-md-6 mx-auto mt-5">
      <div class="card">
        <img class="card-img-top" src="{{ asset('image') }}/{{ $post->image }}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title text-center">{{ $post->title }}</h5>
          <p class="card-text lead">{{ $post->content }}</p>
          Posted By 
          <a href="{{route('author', $post->user_id)}}"> {{$post->user->name}}</a>
          <br>
          Category: 
          <a href="{{route('sortCategory', $post->category_id)}}">{{ $post->category->name}}</a>
        </div>
      </div>
</div>

@endforeach
@endif