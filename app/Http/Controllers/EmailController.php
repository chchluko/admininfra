<?php

namespace App\Http\Controllers;

use App\Email;
use App\EmailType;
use App\TrackingEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class EmailController extends Controller
{
    public function __construct()
    {
     $this->middleware('role:soporte|direccion|datacenter')->only('index');
     $this->middleware('permission:create email')->only('create');
     $this->middleware('permission:view password')->only('view');
     $this->middleware('permission:edit password')->only('edit');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $correo = $request->get('buscarpor');
        $resultado = Email::where('email',"$correo")->paginate(5);
        return view('emails.index',compact('resultado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo = EmailType::get()->pluck('tipo','id')->prepend('Seleccione','0');
        return view('emails.create',compact('tipo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $rules = [
            'password' => 'required|confirmed',
            'nomina' => 'required',
            'email' => 'required|string|email|unique:emails',
            'tipo' => 'in:1,2,3',
        ];
        $messages = [
            'password.required' => 'Debe ingresar un password',
            'password.confirmed' =>'La confirmación del password fallo',
            'nomina.required' => 'El número de Nomina debe ser especificado',
            'email.required' => 'Debe especificar un correo',
            'email.string' => 'Correo no valido',
            'email.email' => 'Correo no valido',
            'email.unique' => 'El correo ya existe, en la base de datos',
            'tipo.in' => 'Debe seleccionar un tipo de cuenta de correo',
        ];
        $this->validate($request, $rules, $messages);
        $email = new Email();
        $email->password = Crypt::encrypt($request->password);
        $email->email = $request->email;
        $email->nomina = $request->nomina;
        $email->email_type_id = $request->tipo;
        $email->save();

        $registro = new TrackingEmail();
        $registro->user_id = Auth::id();
        $registro->email_id = $email->id;
        $registro->accion = $request->accion;
        $registro->motivo = 'Alta en el sistema';
        $registro->save();
        return redirect()->route('emails.index')->with('info',"El registro se guardo correctamente.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function show(Email $email)
    {
       return view('emails.show',compact('email'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function edit(Email $email)
    {
        if((auth()->user()->hasPermissionTo('view password top')) && ($email->email_type_id == 1)) {
            return view('emails.edit',compact('email'));
        }
        if((auth()->user()->hasPermissionTo('view password vip')) && ($email->email_type_id == 2)) {
            return view('emails.edit',compact('email'));
        }
        if((auth()->user()->hasPermissionTo('view password')) && ($email->email_type_id == 3)) {
            return view('emails.edit',compact('email'));
        }
        return redirect()->route('emails.index')->with('alert', "No tienes permisos para editar este registro");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Email $email)
    {
        $rules = [
            'password' => 'required|confirmed',
            'motivo' => 'required',
        ];
        $messages = [
            'password.required' => 'Debe ingresar un nuevo password',
            'password.confirmed' =>'La confirmación del password fallo',
            'motivo.required' => 'El motivo de la actuzalición debe ser especificado',
        ];
        $this->validate($request, $rules, $messages);

        $email->password = Crypt::encrypt($request->password);
        $email->update();
        $registro = new TrackingEmail();
        $registro->user_id = Auth::id();
        $registro->email_id = $email->id;
        $registro->accion = $request->tipo;
        $registro->motivo = $request->motivo;
        $registro->save();
        return redirect()->route('emails.index')->with('info',"La contraseña se cambio correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function destroy(Email $email)
    {
       //
    }

    public function down(Email $email){
        return view('emails.destroy',compact('email'));
    }

    public function downupdate(Request $request, Email $email){
        $rules = [
            'motivo' => 'required',
        ];
        $messages = [
            'motivo.required' => 'El motivo de la baja debe ser especificado',
        ];
        $this->validate($request, $rules, $messages);

        $email->status = 0;
        $email->update();
        $registro = new TrackingEmail();
        $registro->user_id = Auth::id();
        $registro->email_id = $email->id;
        $registro->accion = $request->tipo;
        $registro->motivo = $request->motivo;
        $registro->save();
        return redirect()->route('emails.index')->with('info',"La cuenta de correo se dio de baja correctamente");

       dd($request);
    }

    public function searchEmail(Request $request)
    {
        $rules = [
            'buscarpor' => 'required|email',
        ];
        $messages = [
            'buscarpor.required' => 'Debe especificar un correo',
            'buscarpor.email' => 'Correo no valido',
        ];
        $this->validate($request, $rules, $messages);
        $correo = $request->get('buscarpor');
        $resultado = Email::where('email',"$correo")->paginate(5);
        if ($resultado->count() > 0) {
           return view('emails.index',compact('resultado'));
        }
        return redirect()->route('emails.index')->with('success',"No hay resultados que coincidan");
    }
}
