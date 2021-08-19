<?php

namespace App\Http\Livewire\AssignedKey;

use App\AssignedPhoneKey;
use Livewire\Component;
use Livewire\WithPagination;

class AssignedKeysIndex extends Component
{
    use WithPagination;
    public $search;

    public function render()
    {
        return view('livewire.assigned-key.assigned-keys-index');
    }

    public function getResultsProperty()
    {
        return AssignedPhoneKey::where('clave', 'like', '%' . $this->search . '%')
        ->orwhere('nomina', 'like', '%' . $this->search . '%')
            ->orwhere('nombre', 'like', '%' . $this->search . '%')
            ->orwhere('area', 'like', '%' . $this->search . '%')
            ->orwhere('depto', 'like', '%' . $this->search . '%')
            ->orwhere('puesto', 'like', '%' . $this->search . '%')
            ->orwhere('comentario', 'like', '%' . $this->search . '%')
            ->paginate(15);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
