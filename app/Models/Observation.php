<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    use HasFactory;

    protected $fillable=['observations','observations2','observations3', 'elemento_id'];
   // public $timestamps = false;

    //Relacion de uno a muchos inversa Observation-Elementos
    public function elemento(){
        return $this->belongsTo(Elemento::class);
    }


    /*Relacion de uno a muchos inversa Images-Elementos
    public function user(){
        return $this->belongsTo(User::class);
    } */
}
