<?php

namespace App\Http\Livewire\Platform;

use App\Firewall;
use Livewire\Component;
use Livewire\WithPagination;

class FirewallsIndex extends Component
{
    use WithPagination;
    public $search;

    public function render()
    {
        return view('livewire.platform.firewalls-index');
    }

    public function getResultsProperty()
    {
        return Firewall::where('ip', 'like', '%' . $this->search . '%')->paginate(15);

        if ($this->search = '') {
            return Firewall::where('status_id', 1)->paginate(15);
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
