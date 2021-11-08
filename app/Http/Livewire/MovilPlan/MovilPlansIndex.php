<?php

namespace App\Http\Livewire\MovilPlan;

use App\MovilPlan;
use Livewire\Component;
use Livewire\WithPagination;

class MovilPlansIndex extends Component
{
    use WithPagination;
    public $search;

    public function render()
    {
        return view('livewire.movil-plan.movil-plans-index');
    }

    public function getResultsProperty()
    {
        return MovilPlan::whereHas('tipo', function ($query) {
            $query->where('tipo', 'like', '%' . $this->search . '%');
        })->orwhere('lineatelefonica', 'like', '%' . $this->search . '%')->paginate(15);

        if ($this->search = '') {
            return MovilPlan::paginate(15);
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
