<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Usuarios extends Component
{
    use WithPagination;
    public $search;
    protected $listeners = ['delete'];

    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function render()
    {
        $users = User::where('name', 'like', '%' . $this->search . '%')
                     ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orderBy('id','desc')->paginate(8);

        return view('livewire.usuarios',compact('users'));
    }

    public function delete(User $user){
        $user->delete();
    }


}