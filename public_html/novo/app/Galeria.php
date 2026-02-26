<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    protected $table = 'galeria';
    
    public function foto(){
    	return $this->hasMany('App\Foto');
    }
}
