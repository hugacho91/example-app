<?php

namespace App\Http\Controllers;

use App\Models\InformeFalla;
use Illuminate\Http\Request;

/**
 * Class InformeFallaController
 * @package App\Http\Controllers
 */
class InformeFallaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informeFallas = InformeFalla::paginate(10);

        return view('informe-falla.index', compact('informeFallas'))
            ->with('i', (request()->input('page', 1) - 1) * $informeFallas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $informeFalla = new InformeFalla();
        return view('informe-falla.create', compact('informeFalla'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(InformeFalla::$rules);

        $informeFalla = InformeFalla::create($request->all());

        return redirect()->route('informe-fallas.index')
            ->with('success', 'Informe creado Exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $informeFalla = InformeFalla::find($id);

        return view('informe-falla.show', compact('informeFalla'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $informeFalla = InformeFalla::find($id);

        return view('informe-falla.edit', compact('informeFalla'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  InformeFalla $informeFalla
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InformeFalla $informeFalla)
    {
        request()->validate(InformeFalla::$rules);

        $informeFalla->update($request->all());

        return redirect()->route('informe-fallas.index')
            ->with('success', 'Informe editado Exitosamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $informeFalla = InformeFalla::find($id)->delete();

        return redirect()->route('informe-fallas.index')
            ->with('success', 'Informe eliminado Exitosamente.');
    }
}
