<?php

namespace App\Http\Controllers;

use App\LinkProvider;
use Illuminate\Http\Request;

class LinkProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultado = LinkProvider::paginate(15);
        return view('links.providers.index',compact('resultado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('links.providers.create');
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
            'provedor' => 'required|string',
        ];
        $messages = [
            'provedor.required' => 'Debe introducir un texto',
            'provedor.string' => 'Cadena no valida',
        ];
        $this->validate($request, $rules, $messages);

        $provedor = new LinkProvider($request->all());
        $provedor->save();
        return redirect('enlacesprovedores');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LinkProvider  $linkProvider
     * @return \Illuminate\Http\Response
     */
    public function show(LinkProvider $linkProvider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LinkProvider  $linkProvider
     * @return \Illuminate\Http\Response
     */
    public function edit(LinkProvider $linkProvider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LinkProvider  $linkProvider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LinkProvider $linkProvider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LinkProvider  $linkProvider
     * @return \Illuminate\Http\Response
     */
    public function destroy(LinkProvider $linkProvider)
    {
        //
    }
}
