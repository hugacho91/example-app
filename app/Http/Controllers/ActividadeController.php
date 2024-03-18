<?php

namespace App\Http\Controllers;

use App\Models\Actividade;
use Illuminate\Http\Request;
use App\Models\Expediente;
use Illuminate\Support\Facades\Session;

/**
 * Class ActividadeController
 * @package App\Http\Controllers
 */
class ActividadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   /* public function index()
    {

        $expedientes = Expediente::paginate(10);

        return view('actividade.index', compact('expedientes'))
            ->with('i', (request()->input('page', 1) - 1) * $expedientes->perPage());
    }*/
    public function __construct()
    {
        $this->middleware('can:actividades.index');
    }

    public function index(Request $request)
    {
        // Almacenar los valores de los campos de fecha en la sesión
        Session::put('fecha_desde', $request->input('fecha_desde'));
        Session::put('fecha_hasta', $request->input('fecha_hasta'));
    
        // Obtenemos todos los expedientes sin filtrar
        $expedientes = Expediente::query();
        
        // Verificamos si se han proporcionado fechas de inicio y fin en la solicitud
        if ($request->has(['fecha_desde', 'fecha_hasta'])) {
            // Filtramos los expedientes por el rango de fechas
            $expedientes->whereBetween('fecha_entrada', [$request->input('fecha_desde'), $request->input('fecha_hasta')]);
        }
        
        // Paginamos los resultados
        $expedientes = $expedientes->paginate(10);
        
        // Retornamos la vista con los expedientes y la paginación
        return view('actividade.index', compact('expedientes'))
            ->with('i', (request()->input('page', 1) - 1) * $expedientes->perPage());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actividade = new Actividade();
        return view('actividade.create', compact('actividade'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Actividade::$rules);

        $actividade = Actividade::create($request->all());

        return redirect()->route('actividades.index')
            ->with('success', 'Actividad creada Exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $actividade = Actividade::find($id);

        return view('actividade.show', compact('actividade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actividade = Actividade::find($id);

        return view('actividade.edit', compact('actividade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Actividade $actividade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actividade $actividade)
    {
        request()->validate(Actividade::$rules);

        $actividade->update($request->all());

        return redirect()->route('actividades.index')
            ->with('success', 'Actividade updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $actividade = Actividade::find($id)->delete();

        return redirect()->route('actividades.index')
            ->with('success', 'Actividade deleted successfully');
    }
}
