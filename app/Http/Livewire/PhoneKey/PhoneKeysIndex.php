<?php

namespace App\Http\Livewire\PhoneKey;

use App\PhoneKey;
use Livewire\Component;
use Livewire\WithPagination;


class PhoneKeysIndex extends Component
{
    use WithPagination;
    public $search;

    public function render()
    {
        return view('livewire.phone-key.phone-keys-index');
    }

    public function getResultsProperty()
    {
        return PhoneKey::where('clave', 'like', '%' . $this->search . '%')->paginate(15);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
