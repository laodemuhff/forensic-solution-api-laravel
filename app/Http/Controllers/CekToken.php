<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CekToken extends Controller
{
    public function cekToken(){
        return csrf_token();
    }
}
