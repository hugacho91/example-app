<?php

namespace App\Http\Controllers;

use App\Models\Institucione;
use Illuminate\Http\Request;

/**
 * Class InstitucioneController
 * @package App\Http\Controllers
 */
class InstitucioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instituciones = Institucione::paginate(10);

        return view('institucione.index', compact('instituciones'))
            ->with('i', (request()->input('page', 1) - 1) * $instituciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $institucione = new Institucione();
        return view('institucione.create', compact('institucione'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Institucione::$rules);

        $institucione = Institucione::create($request->all());

        return redirect()->route('instituciones.index')
            ->with('success', 'Institución Creada Exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $institucione = Institucione::find($id);

        return view('institucione.show', compact('institucione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $institucione = Institucione::find($id);

        return view('institucione.edit', compact('institucione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Institucione $institucione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Institucione $institucione)
    {
        request()->validate(Institucione::$rules);

        $institucione->update($request->all());

        return redirect()->route('instituciones.index')
            ->with('success', 'Institución Editada Exitosamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $institucione = Institucione::find($id)->delete();

        return redirect()->route('instituciones.index')
            ->with('success', 'Institución Eliminada Exitosamente.');
    }
}
