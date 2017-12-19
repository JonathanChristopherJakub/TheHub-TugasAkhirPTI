<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function SubmitComment(Request $request){
		$comment = new Comment();
		// dd($comment);
		$comment->comment = $request->comment;
		$comment->post_id = $request->post_id;
		$comment->save();
		return redirect()->route('PostPage');
	}
}
