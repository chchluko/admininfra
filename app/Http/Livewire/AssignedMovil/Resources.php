<?php

namespace App\Http\Livewire\AssignedMovil;

use App\AssignedMovil;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Resources extends Component
{
    use WithFileUploads;
    public $asignacionmovil, $file,$name,$comentario,$iteration;

    public function mount(AssignedMovil $asignacionmovil)
    {
        $this->asignacionmovil = $asignacionmovil;
    }

    public function render()
    {
        return view('livewire.assigned-movil.resources');
    }

    public function save()
    {
        $this->validate([
            'file' => 'required',
            'name' => 'required',
        ]);

        $url = $this->file->store('resources');

        $this->asignacionmovil->resource()->create([
            'url' => $url,
            'name'=> $this->name,
            'comentario'=> $this->comentario,
        ]);

        $this->asignacionmovil = AssignedMovil::find($this->asignacionmovil->id);
        $this->resetInput();
    }

    public function download(){
      return response()->download(storage_path('app/public/'.$this->asignacionmovil->resource->url));
    }

    public function destroy($id){
        $resource = $this->asignacionmovil->resource->find($id);
        Storage::delete($resource->url);
        $this->asignacionmovil->resource->find($id)->delete();
        $this->asignacionmovil = AssignedMovil::find($this->asignacionmovil->id);
    }

    private function resetInput()
    {
        $this->comentario = null;
        $this->name = null;
        $this->file = null;
        $this->iteration++;
    }
}
