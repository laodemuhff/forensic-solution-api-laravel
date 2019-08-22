<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
  protected $table = 'history';
  protected $primaryKey = 'id';

    public function users()
    {
      return $this->belongsTo('App\User', 'id_user');
    }

    public function aturans()
    {
      return $this->belongsToMany('App\Aturan');
    }
}
