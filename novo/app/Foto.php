<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $table = 'foto';
    
    public function galeria(){
        return $this->belongsTo('App\Galeria', 'galeria_id');
    }
}
