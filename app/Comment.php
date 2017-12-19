<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function post(){
    	return $this->belongsTo('App\Post','post_id','id');
    }

    public static function GetAllComments(){
    	return Comment::all();
    }
}
