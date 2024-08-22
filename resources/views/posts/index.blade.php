@extends('layouts.app')

@section('title')
    All Posts
@endsection


@section('content')

<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<a href="{{route('posts.create')}}" class="btn btn-success mt-5">Create Post</a >
<table class="table table-striped">
<thead>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Posted BY</th>
        <th>Description</th>
        <th>Created At</th>
        <th>Image</th>
        <th>Slug</th>

        <th>View </th>
        <th>Edit </th>
        <th>Delete </th>

    </tr>
</thead>
<tbody>


@foreach ($posts as $item)
    <tr>
        <td>{{$item['id']}}</td>
        <td>{{$item['title']}}</td>
        <td>{{$item->user ? $item->user->name: "None" }}</td>
        <td style="white-space: nowrap;overflow: hidden;max-width: 150px;">{{$item['description']}}</td>
        <td>{{$item['created_at']}}</td>
        <td><img src="{{asset('images/posts/'.$item->image)}}" width="50" alt="" srcset=""> </td>

        <td>{{ $item->slug }}</td>

            @if($item->trashed())
            <td>
 
            <form action="{{ route('posts.restore', $item->id) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-warning">Restore</button>
            </form></td>
            <td colspan="2">  <a href="{{route('posts.forceDelete',$item['id'])}}" class="btn btn-danger">Force Delete</a></td>

        @else
          <td>  <a href="{{route('posts.show',$item['id'])}}" class="btn btn-info">Veiw</a></td>
            <td> 
                
           @if (Gate::allows('update-post', $item)) <a href="{{route('posts.edit',$item['id'])}}" class="btn btn-primary">Edit</a>
            @else
            un authorized
            
            @endif
            </td>

            <td> 
                @if (Auth::user() && Auth::user()->can('delete', $item))
                <form action="{{route("posts.destroy",$item)}}" method="post" 
                onsubmit="return confirm('Are you sure you want to delete this post?');">
                @method('delete')
                @csrf
                <input type="submit" class="btn btn-danger" value="Delete">
            </form>
            @else
            un authorized
            @endif

        </td>  @endif

    </tr>

@endforeach
{{-- {{ $posts->links() }} --}}

</tbody>

</table>
{{ $posts->links() }}
@endsection
