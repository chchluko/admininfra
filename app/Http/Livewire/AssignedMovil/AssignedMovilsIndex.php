<?php

namespace App\Http\Livewire\AssignedMovil;

use App\AssignedMovil;
use Livewire\Component;
use Livewire\WithPagination;

class AssignedMovilsIndex extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        return view('livewire.assigned-movil.assigned-movils-index');
    }

    public function getResultsProperty()
    {
        return AssignedMovil::whereHas('imei', function ($query) {
            $query->where('imei', 'like', '%' . $this->search . '%');
        })->orwhereHas('lineatelefonica', function ($query) {
            $query->where('lineatelefonica', 'like', '%' . $this->search . '%');
        })->orwhere('nomina', 'like', '%' . $this->search . '%')
            ->orwhere('nombre', 'like', '%' . $this->search . '%')
            ->orwhere('area', 'like', '%' . $this->search . '%')
            ->orwhere('depto', 'like', '%' . $this->search . '%')
            ->orwhere('puesto', 'like', '%' . $this->search . '%')->paginate(15);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
