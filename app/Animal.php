<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    public function owner (){
        return $this->belongsTo('App\Owner');
    }

    public function specie (){
        return $this->belongsTo('App\Specie');
    }

    public function vets (){
        return $this->belongsToMany('App\Vet');
    }
}
