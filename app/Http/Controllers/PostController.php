<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::where('status', 2)->latest('id')->get();
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post){

        //$posts = Post::where('status', 2)->latest('id')->get();
        
        
        $postAnterior = Post::where('status', 2)
        ->where('id', '<', $post->id)
        ->orderBy('id', 'desc')
        ->first();

        $postSiguiente = Post::where('status', 2)
        ->where('id', '>', $post->id)
        ->orderBy('id')
        ->first();

        return view('posts.show', compact('post','postAnterior', 'postSiguiente'));
    }

  
    
}
