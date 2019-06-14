@extends('layout.master')
@section('title','blog')
@section('content')
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
          <a href="{{route ('sortCategory', $post->category_id)}}">{{ $post->category->name}}</a>
        </div>
      </div>
</div>
@endsection()