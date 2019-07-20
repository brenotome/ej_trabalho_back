<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vet extends Model
{
    public function specialities (){
        return $this->belongsToMany('App\Speciality');
    }

    public function animals (){
        return $this->belongsToMany('App\Animal');
    }
}
