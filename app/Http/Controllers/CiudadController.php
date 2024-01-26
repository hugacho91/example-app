<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use Illuminate\Http\Request;

/**
 * Class CiudadController
 * @package App\Http\Controllers
 */
class CiudadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciudads = Ciudad::paginate(10);

        return view('ciudad.index', compact('ciudads'))
            ->with('i', (request()->input('page', 1) - 1) * $ciudads->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ciudad = new Ciudad();
        return view('ciudad.create', compact('ciudad'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Ciudad::$rules);

        $ciudad = Ciudad::create($request->all());

        return redirect()->route('ciudads.index')
            ->with('success', 'Ciudad created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ciudad = Ciudad::find($id);

        return view('ciudad.show', compact('ciudad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ciudad = Ciudad::find($id);

        return view('ciudad.edit', compact('ciudad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Ciudad $ciudad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ciudad $ciudad)
    {
        request()->validate(Ciudad::$rules);

        $ciudad->update($request->all());

        return redirect()->route('ciudads.index')
            ->with('success', 'Ciudad updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ciudad = Ciudad::find($id)->delete();

        return redirect()->route('ciudads.index')
            ->with('success', 'Ciudad deleted successfully');
    }
}
