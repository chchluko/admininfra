<?php

namespace App\Http\Livewire\Email;

use App\TrackingEmail;
use Livewire\Component;
use App\EmailType as EmailTypeModel;

class EmailType extends Component
{
    public $email,$type_id;
    public $tipo = [];

    public function mount($email) {
        $this->email = $email;
        $this->type_id = $email->tipo->id;
        $this->tipo = EmailTypeModel::get()->pluck('tipo','id')->toArray();
    }

    public function render()
    {
        return view('livewire.email.email-type');
    }

    public function changeEvent($value)
    {
        $this->type_id = $value;
        $this->email->email_type_id = $value;
        if($this->type_id != $this->email->tipo->id) {
           $this->email->update();

           $registro = new TrackingEmail();
           $registro->user_id = auth()->user()->id;
           $registro->email_id = $this->email->id;
           $registro->accion = 'Cambio de tipo de email';
           $registro->motivo = 'Tipo de email cambiado de '.$this->email->tipo->tipo.' a '.$this->tipo[$this->type_id];
           $registro->save();

           $this->showAlert();
        }

    }

    public function showAlert()
    {
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Tipo de Cuenta Actualizada correctamente!',
            'timer'=>5000,
            'type'=> 'success',
            //'toast'=>true,
            //'position'=>'top-right'
        ]);
    }
}
