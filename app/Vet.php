<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vet extends Model
{
    public function animals (){
        return $this->belongsToMany('App\Animal');
    }
}
