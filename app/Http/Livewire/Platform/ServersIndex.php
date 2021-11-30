<?php

namespace App\Http\Livewire\Platform;

use App\Server;
use Carbon\Carbon;
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

        if ($this->search = '') {
            return Server::whereBetween('vigsoporte', [Carbon::now(), Carbon::now()->addMonths(4)])->where('status_id', 1)->paginate(15);
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
