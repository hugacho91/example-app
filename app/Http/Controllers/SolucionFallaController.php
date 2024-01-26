<?php

namespace App\Http\Controllers;

use App\Models\SolucionFalla;
use Illuminate\Http\Request;

/**
 * Class SolucionFallaController
 * @package App\Http\Controllers
 */
class SolucionFallaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solucionFallas = SolucionFalla::paginate(10);

        return view('solucion-falla.index', compact('solucionFallas'))
            ->with('i', (request()->input('page', 1) - 1) * $solucionFallas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $solucionFalla = new SolucionFalla();
        return view('solucion-falla.create', compact('solucionFalla'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(SolucionFalla::$rules);

        $solucionFalla = SolucionFalla::create($request->all());

        return redirect()->route('solucion-fallas.index')
            ->with('success', 'Solución creada Exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $solucionFalla = SolucionFalla::find($id);

        return view('solucion-falla.show', compact('solucionFalla'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $solucionFalla = SolucionFalla::find($id);

        return view('solucion-falla.edit', compact('solucionFalla'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  SolucionFalla $solucionFalla
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SolucionFalla $solucionFalla)
    {
        request()->validate(SolucionFalla::$rules);

        $solucionFalla->update($request->all());

        return redirect()->route('solucion-fallas.index')
            ->with('success', 'Solución editada Exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $solucionFalla = SolucionFalla::find($id)->delete();

        return redirect()->route('solucion-fallas.index')
            ->with('success', 'Solución eliminada Exitosamente');
    }
}
