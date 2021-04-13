<?php

namespace App\Http\Controllers;

use App\LinkStatus;
use Illuminate\Http\Request;

class LinkStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultado = LinkStatus::paginate(15);
        return view('links.status.index',compact('resultado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LinkStatus  $linkStatus
     * @return \Illuminate\Http\Response
     */
    public function show(LinkStatus $linkStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LinkStatus  $linkStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(LinkStatus $linkStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LinkStatus  $linkStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LinkStatus $linkStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LinkStatus  $linkStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(LinkStatus $linkStatus)
    {
        //
    }
}
