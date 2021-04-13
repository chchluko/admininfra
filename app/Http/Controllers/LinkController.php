<?php

namespace App\Http\Controllers;

use App\Link;
use App\LinkType;
use App\Ubicacion;
use App\LinkStatus;
use App\LinkProvider;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultado = Link::where('referencia','')->paginate(15);
        return view('links.index',compact('resultado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = LinkType::get()->pluck('tipo','id')->prepend('Seleccione',0);
        $provedores = LinkProvider::get()->pluck('provedor','id')->prepend('Seleccione',0);
        $status = LinkStatus::get()->pluck('status','id')->prepend('Seleccione',0);
        $ubicaciones = Ubicacion::orderBy('NOMBRE_AREA')->pluck('NOMBRE_AREA','IDAREA')->prepend('Seleccione',0);
        return view('links.create',compact('tipos','provedores','status','ubicaciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $enlace = new Link($request->all());
        $enlace->save();
        return redirect('enlaces')->with('success', "Registro guardado correctammente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function show(Link $enlace)
    {
        return view('links.show',compact('enlace'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $enlace)
    {
        $tipos = LinkType::get()->pluck('tipo','id')->prepend('Seleccione',0);
        $provedores = LinkProvider::get()->pluck('provedor','id')->prepend('Seleccione',0);
        $status = LinkStatus::get()->pluck('status','id')->prepend('Seleccione',0);
        $ubicaciones = Ubicacion::orderBy('NOMBRE_AREA')->pluck('NOMBRE_AREA','IDAREA')->prepend('Seleccione',0);
        return view('links.edit',compact('tipos','provedores','status','ubicaciones','enlace'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Link $enlace)
    {
        $enlace->update($request->all());
        return redirect('enlaces')->with('success', "Registro Actualizado correctammente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        //
    }


    public function searchLink(Request $request)
    {
        $rules = [
            'nombre' => 'required|string',
            'tipo' => 'notin:0'
        ];
        $messages = [
            'nombre.required' => 'Debe introducir un texto',
            'nombre.string' => 'Cadena no valida',
            'tipo.notin' => 'Debe elegir un tipo de campo a buscar',
        ];
        $this->validate($request, $rules, $messages);

        $resultado = Link::buscarpor($request->tipo, $request->nombre)->paginate(15);

        if ($resultado->count() > 0) {
            return view('links.index', compact('resultado'));
        }
        return redirect()->route('enlaces.index')->with('info', "No hay resultados que coincidan");
    }
}
