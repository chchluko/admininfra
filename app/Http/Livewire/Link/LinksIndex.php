<?php

namespace App\Http\Livewire\Link;

use App\Link;
use Livewire\Component;
use Livewire\WithPagination;

class LinksIndex extends Component
{
    use WithPagination;
    public $search;

    public function render()
    {
        return view('livewire.link.links-index');
    }

    public function getResultsProperty(){
        return Link::whereHas('provedor', function ($query) {
            $query->where('provedor', 'like','%'. $this->search . '%');
        })->orwhereHas('tipo', function ($query) {
            $query->where('tipo', 'like','%'. $this->search . '%');
        })->orwhere('referencia','like','%'. $this->search . '%')->paginate(15);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
