@extends('layout.master')
@section('title','Blogs')
@section('content')
<div class="jumbotron image d-flex justify-content-center align-items-center">
  <h1 class="display-4">Title</h1>
</div>
<div class="container">
  <div class="row">
    @foreach($posts as $post)
    <div class="col-md-4">
      <div class="card">
        <img class="card-img-top" src="{{ asset('image')}}/{{ $post->image }}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title text-center">{{ $post->title }}</h5>
          <p class="card-text lead">{{ $post->content }}</p>
          Posted By 
          <a href="{{route('author', $post->user_id)}}"> {{$post->user->name}}</a>
          <br>
          Category: 
          <a href="{{route('sortCategory', $post->category_id)}}">{{ $post->category->name}}</a>
          <br>
          <a href="{{ route('task.edit',$post->id) }}" class="btn btn-secondary"><i class="fa fa-pencil"></i> Edit</a>
          <form action="{{ route('task.destroy', $post->id) }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token()}}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-danger" onclick=" return confirm('Are you sure?')";><i class="fa fa-trash-o"></i> Delete</button>
          </form>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection()
