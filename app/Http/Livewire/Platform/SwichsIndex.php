<?php

namespace App\Http\Livewire\Platform;

use App\Swich;
use Livewire\Component;
use Livewire\WithPagination;

class SwichsIndex extends Component
{
    use WithPagination;
    public $search;

    public function render()
    {
        return view('livewire.platform.swichs-index');
    }

    public function getResultsProperty()
    {
        return Swich::where('ip', 'like', '%' . $this->search . '%')->paginate(15);

        if ($this->search = '') {
            return Swich::where('status_id', 1)->paginate(15);
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
