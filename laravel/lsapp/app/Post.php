<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // //Table name 
    // protected $table = 'posts';
    // //Primary Key 
    // public $primaryKey = "item_id";
    
    // // Timespamps 
    // public $tiemstamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
}