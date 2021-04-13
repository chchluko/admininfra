<?php

namespace App\Http\Controllers;

use App\LinkType;
use Illuminate\Http\Request;

class LinkTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultado = LinkType::paginate(15);
        return view('links.tipos.index',compact('resultado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('links.tipos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'tipo' => 'required|string',
        ];
        $messages = [
            'tipo.required' => 'Debe introducir un texto',
            'tipo.string' => 'Cadena no valida',
        ];
        $this->validate($request, $rules, $messages);

        $tipodeenlace = new LinkType($request->all());
        $tipodeenlace->save();
        return redirect('enlacestipos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LinkType  $linkType
     * @return \Illuminate\Http\Response
     */
    public function show(LinkType $linkType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LinkType  $linkType
     * @return \Illuminate\Http\Response
     */
    public function edit(LinkType $linkType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LinkType  $linkType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LinkType $linkType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LinkType  $linkType
     * @return \Illuminate\Http\Response
     */
    public function destroy(LinkType $linkType)
    {
        //
    }
}
