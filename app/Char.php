<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Char extends Model
{
    protected $table = 'chars';
    protected $primaryKey = 'id_karakteristik';

    public function aturans()
    {
      return $this->belongsToMany('App\Aturan', 'aturan_char');
    }
}
