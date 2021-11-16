<?php

namespace App\Http\Livewire\Movil;

use Livewire\Component;
use App\AssignedMovil;
use Livewire\WithPagination;

class MovilSearch extends Component
{
    use WithPagination;
    public $search, $history;

    public function render()
    {
        return view('livewire.movil.movil-search');
    }

    public function getResultsProperty()
    {
            return AssignedMovil::whereHas('imei', function ($query) {
                $query->where('imei', 'like', '%' . $this->search . '%');
            })
                /*   ->orwhereHas('lineatelefonica', function ($query) {
                    $query->where('lineatelefonica', 'like', '%' . $this->search . '%');
                })*/
                ->orwhere('nomina', 'like', '%' . $this->search . '%')
                ->orwhere('nombre', 'like', '%' . $this->search . '%')
                ->orwhere('area', 'like', '%' . $this->search . '%')
                ->orwhere('depto', 'like', '%' . $this->search . '%')
                ->orwhere('puesto', 'like', '%' . $this->search . '%')
                ->history($this->history)->paginate(15);

    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
