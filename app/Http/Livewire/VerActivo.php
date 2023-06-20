<?php

namespace App\Http\Livewire;

use App\Models\Elemento;
use App\Models\Image;
use App\Models\Observation;
use Livewire\Component;

class VerActivo extends Component
{
    public $open = false;
    public $activo;
    public $image;
    public $obs;
     
    public function mount(Elemento $activo){
        $this->activo = $activo;
        $this->image = Image::where('elemento_id',$activo->id)->first();
        $this->obs = Observation::where('elemento_id',$activo->id)->first();
    }
    
    public function render()
    {
        return view('livewire.ver-activo');
    }
}