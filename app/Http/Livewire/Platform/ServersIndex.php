<?php

namespace App\Http\Livewire\Platform;

use App\Server;
use Livewire\Component;
use Livewire\WithPagination;

class ServersIndex extends Component
{
    use WithPagination;
    public $search;

    public function render()
    {
        return view('livewire.platform.servers-index');
    }

    public function getResultsProperty()
    {
        return Server::where('ip', 'like', '%' . $this->search . '%')->paginate(15);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
