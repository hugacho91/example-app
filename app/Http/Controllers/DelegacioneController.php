<?php

namespace App\Http\Controllers;

use App\Models\Delegacione;
use Illuminate\Http\Request;

/**
 * Class DelegacioneController
 * @package App\Http\Controllers
 */
class DelegacioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('can:delegaciones.index');
    }

    public function index()
    {
        $delegaciones = Delegacione::paginate(10);

        return view('delegacione.index', compact('delegaciones'))
            ->with('i', (request()->input('page', 1) - 1) * $delegaciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $delegacione = new Delegacione();
        return view('delegacione.create', compact('delegacione'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Delegacione::$rules);

        $delegacione = Delegacione::create($request->all());

        return redirect()->route('delegaciones.index')
            ->with('success', 'Delegacione created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $delegacione = Delegacione::find($id);

        return view('delegacione.show', compact('delegacione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $delegacione = Delegacione::find($id);

        return view('delegacione.edit', compact('delegacione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Delegacione $delegacione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Delegacione $delegacione)
    {
        request()->validate(Delegacione::$rules);

        $delegacione->update($request->all());

        return redirect()->route('delegaciones.index')
            ->with('success', 'Delegacione updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $delegacione = Delegacione::find($id)->delete();

        return redirect()->route('delegaciones.index')
            ->with('success', 'Delegacione deleted successfully');
    }
}
