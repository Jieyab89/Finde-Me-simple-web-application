<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
  protected $fillable = [
		'user_id', 'title', 'slug', 'content', 'photo'
	];

  //relation
  public function user()
  {
    return $this->belongsTo(User::class);
  }

}
