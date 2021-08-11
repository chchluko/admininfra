<?php

namespace App\Http\Livewire\Email;

use App\Email;
use Livewire\Component;

class EmailsIndex extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.email.emails-index');
    }

    public function getResultsProperty(){

        return Email::where('email','like','%'. $this->search . '%')
        ->Orwhere('nomina','like','%'. $this->search . '%')
        ->where('status',1)
        ->get()->take(8);
    }

}
