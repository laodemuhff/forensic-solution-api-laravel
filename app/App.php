<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    protected $table = 'apps';
    protected $primaryKey = 'id_aplikasi';

    public function aturans()
    {
      return $this->hasMany('App\Aturan');
    }
}
