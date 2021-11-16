<?php

namespace App\Http\Livewire\Movil;

use App\Movil;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Resources extends Component
{
    use WithFileUploads;
    public $movil, $file,$name,$comentario,$iteration;

    public function mount(Movil $movil)
    {
        $this->movil = $movil;
    }

    public function render()
    {
        return view('livewire.movil.resources');
    }

    public function save()
    {
        $this->validate([
            'file' => 'required',
            'name' => 'required',
        ]);

        $url = $this->file->store('resources');

        $this->movil->resource()->create([
            'url' => $url,
            'name'=> $this->name,
            'comentario'=> $this->comentario,
        ]);

        $this->movil = Movil::find($this->movil->id);
        $this->resetInput();
    }

    public function download(){
      return response()->download(storage_path('app/public/'.$this->movil->resource->url));
    }

    public function destroy($id){
        $resource = $this->movil->resource->find($id);
        Storage::delete($resource->url);
        $this->movil->resource->find($id)->delete();
        $this->movil = Movil::find($this->movil->id);
    }

    private function resetInput()
    {
        $this->comentario = null;
        $this->name = null;
        $this->file = null;
        $this->iteration++;
    }
}
