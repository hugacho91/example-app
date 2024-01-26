<?php

namespace App\Http\Controllers;

use App\Models\Institución;
use Illuminate\Http\Request;

/**
 * Class InstituciónController
 * @package App\Http\Controllers
 */
class InstituciónController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instituciones = Institución::paginate(10);

        return view('institución.index', compact('instituciones'))
            ->with('i', (request()->input('page', 1) - 1) * $instituciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $institución = new Institución();
        return view('institución.create', compact('institución'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Institución::$rules);

        $institución = Institución::create($request->all());

        return redirect()->route('instituciones.index')
            ->with('success', 'Institución created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $institución = Institución::find($id);

        return view('institución.show', compact('institución'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $institución = Institución::find($id);

        return view('institución.edit', compact('institución'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Institución $institución
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Institución $institución)
    {
        request()->validate(Institución::$rules);

        $institución->update($request->all());

        return redirect()->route('instituciones.index')
            ->with('success', 'Institución updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $institución = Institución::find($id)->delete();

        return redirect()->route('instituciones.index')
            ->with('success', 'Institución deleted successfully');
    }
}
