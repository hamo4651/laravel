@extends('layout.app')

@section('title')
    All Posts
@endsection


@section('main')

{{-- 
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}

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
        <th>Action </th>

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

       

            @if($item->trashed())
            <td>

            <form action="{{ route('posts.restore', $item->id) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-warning">Restore</button>
            </form></td>
            <td colspan="2">  <a href="{{route('posts.forceDelete',$item['id'])}}" class="btn btn-danger">Force Delete</a></td>

        @else
          <td>  <a href="{{route('posts.show',$item['id'])}}" class="btn btn-info">Veiw</a></td>
            <td>  <a href="{{route('posts.edit',$item['id'])}}" class="btn btn-primary">Edit</a></td>

            <td>   <form action="{{route("posts.destroy",$item)}}" method="post" 
                onsubmit="return confirm('Are you sure you want to delete this post?');">
                @method('delete')
                @csrf
                <input type="submit" class="btn btn-danger" value="Delete">
            </form>
            @endif

        </td>

    </tr>

@endforeach
{{-- {{ $posts->links() }} --}}

</tbody>

</table>
{{ $posts->links() }}
@endsection
