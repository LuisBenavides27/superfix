<?php

namespace App\Http\Livewire;

use App\Models\Centro;
use Livewire\Component;

class Elemento extends Component
{

    public function render()
    {        
        $centros = Centro::orderBy('name')->get();
        return view('livewire.elemento',compact('centros'));
    }
}
