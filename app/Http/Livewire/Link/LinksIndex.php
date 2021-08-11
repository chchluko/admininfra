<?php

namespace App\Http\Livewire\Link;

use App\Link;
use Livewire\Component;

class LinksIndex extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.link.links-index');
    }

    public function getResultsProperty(){

     //   return Link::where('referencia','like','%'. $this->search . '%')->get()->take(8);

        return Link::whereHas('provedor', function ($query) {
            $query->where('provedor', 'like','%'. $this->search . '%');
        })->orwhere('referencia','like','%'. $this->search . '%')->get()->take(8);


    }
}
