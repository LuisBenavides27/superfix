<?php

namespace App\Http\Livewire;

use App\Models\Centro;
use App\Models\Elemento;
use Livewire\Component;
use Livewire\WithPagination;

class Activos extends Component
{
    public $search;
    public $filtroEstado = '';

    use WithPagination;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFiltroEstado()
    {
        $this->resetPage();
    }


    public function render()
    {
        if (auth()->user()->hasRole('Tecnico')) {
            $activos = Elemento::where(function ($query) {
                $query->where('active', 'like', '%' . $this->search . '%')
                    ->orWhere('serial', 'like', '%' . $this->search . '%');
            })
                ->when($this->filtroEstado, function ($query) {
                    $query->where('status', $this->filtroEstado);
                })
                ->where('zone', auth()->user()->zone)
                ->orWhere('user_id', auth()->user()->id)
                ->orderBy('id', 'desc')
                ->paginate(8);

            $centro = Centro::all();

            return view('livewire.activos', compact('activos', 'centro'));
        } elseif (auth()->user()->hasRole('Lider')) {

            $activoso = Elemento::where(function ($query) {
                $query->where('active', 'like', '%' . $this->search . '%')
                    ->orWhere('serial', 'like', '%' . $this->search . '%');
            })
                ->when($this->filtroEstado, function ($query) {
                    $query->where('status', $this->filtroEstado);
                })
                ->where('user_id', auth()->user()->id)
                ->orderBy('id', 'desc')
                ->paginate(8);

            return view('livewire.activos', compact('activoso'));
        } else {
            $activos = Elemento::where(function ($query) {
                $query->where('active', 'like', '%' . $this->search . '%')
                    ->orWhere('serial', 'like', '%' . $this->search . '%');
            })
                ->when($this->filtroEstado, function ($query) {
                    $query->where('status', $this->filtroEstado);
                })
                ->orderBy('id', 'desc')
                ->paginate(8);
            $centro = Centro::all();
            return view('livewire.activos', compact('activos', 'centro'));

        }
    }
}
