<?php

namespace App\Http\Livewire\MovilPlan;

use App\MovilPlan;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Resources extends Component
{
    use WithFileUploads;
    public $movilplan, $file,$name,$comentario,$iteration;

    public function mount(MovilPlan $movilplan)
    {
        $this->movilplan = $movilplan;
    }

    public function render()
    {
        return view('livewire.movil-plan.resources');
    }


    public function save()
    {
        $this->validate([
            'file' => 'required',
            'name' => 'required',
        ]);

        $url = $this->file->store('resources');

        $this->movilplan->resource()->create([
            'url' => $url,
            'name'=> $this->name,
            'comentario'=> $this->comentario,
        ]);

        $this->movilplan = MovilPlan::find($this->movilplan->id);
        $this->resetInput();
    }

    public function download(){
      return response()->download(storage_path('app/public/'.$this->movilplan->resource->url));
    }

    public function destroy($id){
        $resource = $this->movilplan->resource->find($id);
        Storage::delete($resource->url);
        $this->movilplan->resource->find($id)->delete();
        $this->movilplan = MovilPlan::find($this->movilplan->id);
    }

    private function resetInput()
    {
        $this->comentario = null;
        $this->name = null;
        $this->file = null;
        $this->iteration++;
    }
}
