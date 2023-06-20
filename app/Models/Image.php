<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable=['url','elemento_id'];

    //Relacion de uno a muchos inversa Images-Elementos
    public function elemento(){
        return $this->belongsTo(Elemento::class);
    }
}
