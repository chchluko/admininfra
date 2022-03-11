<?php

namespace App\Http\Livewire\Platform;

use App\Router;
use Livewire\Component;
use Livewire\WithPagination;

class RoutersIndex extends Component
{
    use WithPagination;
    public $search;

    public function render()
    {
        return view('livewire.platform.routers-index');
    }

    public function getResultsProperty()
    {
        return Router::where('ip', 'like', '%' . $this->search . '%')->paginate(15);

        if ($this->search = '') {
            return Router::where('status_id', 1)->paginate(15);
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
