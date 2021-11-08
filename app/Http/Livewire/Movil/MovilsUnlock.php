<?php

namespace App\Http\Livewire\Movil;

use App\Movil;
use App\Warehouse;
use Livewire\Component;

class MovilsUnlock extends Component
{
    public $warehouses = [];
    public $warehouse_id;

    public function mount($movil) {
         $this->movil = $movil;
         $this->warehouses = Warehouse::whereNotIn('id',[1])->get()->pluck('name','id')->toArray();
        }

    public function render()
    {
        return view('livewire.movil.movils-unlock');
    }

    public function store()
    {
        $this->validate([
            'warehouse_id' => 'Notin:1',
        ],['in'=>'Debe seleccionar un Almacen']);

        $this->movil->update([
            'warehouse_id' => $this->warehouse_id,
        ]);


     //   $this->showAlert();
        $this->resetInput();
    }

    public function showAlert()
    {
        $this->dispatchBrowserEvent('swal', [
            'title' => ' Marcaje Guardado correctamente!',
            'timer'=>5000,
            'type'=> 'success',
            //'toast'=>true,
            //'position'=>'top-right'
        ]);
    }

    private function resetInput()
    {
        $this->comentario = null;
    }
}
