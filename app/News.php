<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
  protected $table = 'new';
  protected $primaryKey = 'id';

    public function users()
    {
      return $this->belongsTo('App\User', 'id_user');
    }
}
