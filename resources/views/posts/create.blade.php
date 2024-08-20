@extends('layout.app')

@section('title')
Create

@endsection


@section('main')





  <form action="{{route('posts.store')}}" method="post" >
    @csrf
    <div class="my-3 ">
        <label for="title" class="form-label">Title</label>
      <input type="text"  class="form-control" name="title" value="{{ old('title') }}" >
      @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">Description</label>
        <input type="text" class="form-control" name="description" value="{{ old('description') }}" >
        @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
      </div>
      <div class="mb-3">
        
        <div class="form-group">
          <label for="user_id">Post creator</label>
          <select name="user_id" id="user_id" class="form-control">
            <option value="{{ old('user_id') }}" selected>{{ old('user_id') }} </option>

              @foreach($users as $user)
                  <option value="{{ $user->id }}">{{ $user->name }}</option>
              @endforeach
          </select>
          @error('postby')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
      </div>



      </div>
       





    
    <button type="submit" class="btn btn-primary">Create</button>
  </form>

   

@endsection
