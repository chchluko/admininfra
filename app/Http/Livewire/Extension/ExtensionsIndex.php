<?php

namespace App\Http\Livewire\Extension;


use App\Extension;
use Livewire\Component;
use Livewire\WithPagination;

class ExtensionsIndex extends Component
{
    use WithPagination;
    public $search;

    public function render()
    {
        return view('livewire.extension.extensions-index');
    }

    public function getResultsProperty(){
        return Extension::where('nomina','like','%'. $this->search . '%')
        ->orwhere('extension','like','%'. $this->search . '%')
        ->orwhere('nombre','like','%'. $this->search . '%')
        ->orwhere('area','like','%'. $this->search . '%')
        ->orwhere('depto','like','%'. $this->search . '%')
        ->orwhere('puesto','like','%'. $this->search . '%')
        ->paginate(15);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
