@extends('layout.app')

@section('title')
     one Post
@endsection


@section('main')


<div class="card">
    <h5 class="card-header">Post Info</h5>
    <div class="card-body">
      <h5 class="card-title">Title : {{$post['title']}}</h5>
      <p class="card-text">posted by : {{$post->user ? $post->user->name: "None" }}</p>
      <p class="card-text">description : {{$post['description']}}</p>
      {{-- <p class="card-text">created at : {{ $post->created_at->format('l jS \of F Y h:i:s A')}}</p> --}}
      <p class="card-text">created at : {{ $post->human_readable_date}}</p>

    </div>
  </div>

  <a href="{{route('posts.index')}}" class="btn btn-primary">Return Back</a>


   

@endsection
