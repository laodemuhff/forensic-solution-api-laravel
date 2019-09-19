<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fung extends Model
{
    protected $table = 'fungs';
    protected $primaryKey = 'id_fungsionalitas';

    public function apps()
    {
      return $this->belongsToMany('App\App', 'app_fung');
    }
}
