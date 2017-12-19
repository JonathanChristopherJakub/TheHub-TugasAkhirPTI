<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public static function GetAllPosts(){
    	return Post::all();
    }

    public function comments(){
    	return $this->hasMany("App\Comment");
    }
}
