<?php

namespace App\Http\Controllers;

use App\Models\Empresario;
use Illuminate\Http\Request;

class EmpresarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Empresario::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empresario = new Empresario;
        $empresario->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresario  $empresario
     * @return \Illuminate\Http\Response
     */
    public function show(Empresario $empresario)
    {
        return $empresario;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresario  $empresario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresario $empresario)
    {
        $empresario->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresario  $empresario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresario $empresario)
    {
        $empresario->delete();
    }
}
