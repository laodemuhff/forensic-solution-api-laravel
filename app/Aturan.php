<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aturan extends Model
{
  protected $table = 'aturan';
  protected $primaryKey = 'id_aturan';
    public function Apps()
    {
      return $this->belongsTo('App\App');
    }

    public function chars()
    {
      return $this->belongsToMany('App\Char');
    }
}
