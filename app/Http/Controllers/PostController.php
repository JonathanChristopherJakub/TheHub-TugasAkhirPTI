<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;


class PostController extends Controller
{
	public function PostPage(){
		$posts = Post::GetAllPosts();
		return view('create_post')->with('posts',$posts);
	}

	public function SubmitPost(Request $request){
		$post = new Post();
		// dd($post);
		$post->title = $request->title;
		$post->content = $request->content;
		$post->save();
		return redirect()->route('PostPage');
	}

	public function DeletePost(Request $request){
		$id = $request->id;
		$post = Post::find($id);
		$post->delete();
		return redirect()->route('PostPage');
	}
}
