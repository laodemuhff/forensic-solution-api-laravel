<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
  protected $table = 'aturan_char';
    public function fungs()
    {
      return $this->belongsTo('App\Fung');
    }

    public function histories()
    {
      return $this->belongsToMany('App\History', 'history_aturan');
    }

    public function chars()
    {
      return $this->belongsTo('App\Char', 'char_id_karakteristik', 'id_karakteristik');
    }

    public function aturans(){
      return $this->belongsTo('App\Aturan', 'aturan_id_aturan', 'id_aturan');
    }
}
