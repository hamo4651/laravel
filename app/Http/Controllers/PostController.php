<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
         $this->middleware('auth')->only('show');
     }
    public function index()
    {
        $posts = Post::withTrashed()->paginate(4);
          
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();

        return view('posts.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        // $request->validate([
        //    'title' => 'required|unique:posts|min:3',
        //    'description' => 'required|min:10',
        //    'user_id' => 'required'
        // ]);
        $image_path = null;
        if ($request->hasFile('image')) {
            $image_path = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/posts'), $image_path);
        }
        $request_data = $request->all();
        $request_data['image'] = $image_path;
        $request_data['owner_id']= Auth::id();
         $post = Post::create($request_data);
        return to_route('posts.show', $post);

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
        

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $users = User::all();

        return view('posts.edit', compact('post','users'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {

        if (! Gate::allows('update-post', $post)) {
            abort(403);
        }

        $image_path = $post->image;
        if( $request->hasFile('image')) {
            $image_path = time() .'.'. $request->image->extension();
            $request->image->move(public_path('images/posts'), $image_path);
        }

        $request_data = $request->all();
        $request_data['image'] = $image_path;
        $post->update($request_data);

        return redirect()->route('posts.index');
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Gate::authorize('delete', $post);
        $post->delete();
        return to_route('posts.index'); 
    }


    public function restore($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->restore();
        return to_route('posts.index');
    }
    public function forceDelete($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->forceDelete();
        return to_route('posts.index');
    }
}
