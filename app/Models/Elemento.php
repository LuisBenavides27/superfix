<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elemento extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];
    //public $timestamps = false;

    //Relacion de uno a muchos Users-Elementos
    public function user(){
        return $this->belongsTo(User::class);
    }

    //Relacion de uno a muchos Elementos-Images
    public function image(){
        return $this->hasMany(Image::class);
    }

    //Relacion de uno a muchos Elementos-observation
    public function observation(){
        return $this->hasMany(Observation::class);
    }

    //Relacion de uno a uno Elementos-Centro de costo
    public function centro(){
        return $this->belongsTo(Centro::class);
    }
}
