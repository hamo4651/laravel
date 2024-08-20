@extends('layout.app')

@section('title')
    edit Post
@endsection


@section('main')
    <form action="{{ route('posts.update', $post['id']) }}" method="post">
        @csrf
        @method('PUT')
        <div class="my-3 ">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" value="{{ $post['title'] }}">

            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Description</label>
            <input type="text" class="form-control" name="description" value="{{ $post['description'] }}">
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">


            <div class="form-group">

                <label for="user_id">Post creator</label>
                <select name="user_id" id="user_id" class="form-control">
                    <option value="{{ $post->user ? $post->user->id : 'None' }}" selected>
                        {{ $post->user ? $post->user->name : 'None' }} </option>

                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>

                @error('postby')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>



        </div>


        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
