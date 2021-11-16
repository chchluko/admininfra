<?php

namespace App\Http\Livewire\Movil;

use App\Movil;
use Livewire\Component;
use Livewire\WithPagination;

class MovilsIndex extends Component
{
    use WithPagination;
    public $search;
    public $tipo = [];

    public function render()
    {
        return view('livewire.movil.movils-index');
    }

    public function getResultsProperty()
    {
        return Movil::whereHas('lineatelefonica', function ($query) {
            $query->where('lineatelefonica', 'like', '%' . $this->search . '%');
        })->orwhere('imei', 'like', '%' . $this->search . '%')->tipo($this->tipo)->paginate(15);

        if ($this->search = '') {
            return Movil::all()->tipo($this->tipo)->paginate(15);
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
