<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vipusers extends Model
{
  protected $fillable = [
    'user_id', 'vip_status'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'user_id', 'vip_status'
  ];

}
