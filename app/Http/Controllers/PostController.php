<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function deletePost(Post $post){
        if(auth()->user()->id ===$post['user_id']){
           $post->delete();
        } // if you are the auther of the post
        return redirect('/');
    }
    public function actuallyUpdatePost(Post $post, Request $request){
        if(auth()->user()->id !==$post['user_id']){
           return redirect('/');
        }
            $incomingFields = $request->validate([
                'title'=> 'required',
                'body' => 'required'
                ]);
            $incomingFields['title'] = strip_tags($incomingFields['title']);
             $incomingFields['body'] = strip_tags($incomingFields['body']);
           
             $post->update($incomingFields);
            return redirect('/');

        }
       //return redirect('/');
       public function showEditScreen(Post $post) {
        if (auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }

        return view('edit-post', ['post' => $post]);
    }
    public function createPost(Request $request){
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
//to aviod xss
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        $incomingFields['user_id'] = auth()->id();

        Post::create($incomingFields);
        return redirect('/');
    }

}
