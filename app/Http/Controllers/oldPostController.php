<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\post;
use App\Models\User;
use Carbon\Carbon;

class oldPostController extends Controller
{
    // private  $posts = [
    //     ["id"=>1,"Title" => "learn php", "posted" => "ahmed", "created"=>'7-8-2024'],
    //     ["id"=>2,"Title" => "learn html", "posted" => "ali","created"=>'14-12-2024'],
    //     ["id"=>3,"Title" => "learn css", "posted" => "hamdy",'created'=>'14-8-2023'],
    //     ["id"=>4,"Title" => "learn js", "posted" => "hany",'created'=>'9-8-2024']
    //     ];

    public function index()
    {
        $posts = post::paginate(3);  
          
        return view('posts.index', ['posts' => $posts]);
    }

    public function show($id)
    {

        $post = post::findOrFail($id);

        return view('posts.show', ['post' => $post]);
    }



    public function delete($id)
    {
        $post = post::findOrFail($id);
        $post->delete();
        return to_route('posts.index');    }

    //////////////////////////////

    public function create()
    {
        $users = User::all(); 

        return view('posts.create', ['users' => $users]);
    }
    public function store()
    {
        // request()->validate([
        //     'title' => 'required|unique|min:3',
        //     'description' => 'required|min:10',
        //     'postby' => 'required'

        // ]);
        $data = request()->all();
        //    dump($data);
        $post = new post();

        $post->title = $data['title'];
        $post->description = $data['description'];
        $post->postby = $data['postby'];
        $post->created_at = Carbon::now();
        $post->save();
        return to_route('posts.index');
    }


    public function edit($id)
    {

        $post = post::findOrFail($id);
        $users = User::all();

        return view('posts.edit', ['post' => $post, 'users' => $users]);
    }

    public function update($id)
    {

        $data = request()->all();
        //    dump($data);
        $post = post::findOrFail($id);

        $post->title = $data['title'];
        $post->description = $data['description'];
        $post->postby = $data['postby'];
        $post->save();
        return to_route('posts.index');
    }
}
