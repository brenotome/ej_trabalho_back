<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    public function vets (){
        return $this->belongsToMany('App\Vet');
    }
}
