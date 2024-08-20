<?php

namespace App\Http\Controllers;

abstract class Controller
{
    // private  $posts = [
    //     ["id"=>1,"Title" => "learn php", "posted" => "ahmed", "created"=>'7-8-2024'],
    //     ["id"=>2,"Title" => "learn html", "posted" => "ali","created"=>'14-12-2024'],
    //     ["id"=>3,"Title" => "learn css", "posted" => "hamdy",'created'=>'14-8-2023'],
    //     ["id"=>4,"Title" => "learn js", "posted" => "hany",'created'=>'9-8-2024']
    //     ];

    //     public function index(){
    //         return view('posts.index',['posts'=> $this->posts]);
    //     }

    //     public function show($id){

    //         foreach ($this->posts as  $post) {
    //             if($post['id']== $id){
    //                 return view('posts.show',['post'=> $post]);

    //             }
    //         }

    //         return 'notfound';    
        
    //     }

    //     public function edit($id){

    //         foreach ($this->posts as  $post) {
    //             if($post['id']== $id){
    //                 return view('posts.show',['post'=> $post]);

    //             }
    //         }

    //         return 'notfound';    
        
    //     }
}
