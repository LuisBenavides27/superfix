<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
    use HasFactory;

      //Relacion de uno a uno inversa Centro de costo-Elementos
    public function elemento(){
        return $this->hasOne(Elemento::class);
    }
}
