<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
    public function animals (){
        return $this->hasMany('App\Animal');
    }
}
