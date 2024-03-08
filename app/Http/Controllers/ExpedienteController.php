<?php

namespace App\Http\Controllers;

use App\Models\Expediente;
use Illuminate\Http\Request;
use App\Models\Archivo;
use Illuminate\Support\Facades\Storage;

/**
 * Class ExpedienteController
 * @package App\Http\Controllers
 */
class ExpedienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expedientes = Expediente::paginate(10);

        return view('expediente.index', compact('expedientes'))
            ->with('i', (request()->input('page', 1) - 1) * $expedientes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expediente = new Expediente();
        return view('expediente.create', compact('expediente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate(Expediente::$rules);

        $expediente = Expediente::create($request->all());


        $files = $request->file('files');

        
        // Recorrer los archivos y guardarlos en la base de datos
        foreach($files as $file) {
            // Guardar el archivo en el sistema de archivos
            if(Storage::putFileAs('/public/'.$expediente->id.'/',$file,$file->getClientOriginalName())){
                $nombreArchivo = $file->getClientOriginalName(); // Nombre original del archivo
                $rutaArchivo = $file->store('archivos'); // Ruta donde se guardará el archivo

                // Crear un nuevo registro de archivo y relacionarlo con el expediente
                $archivo = new Archivo();
                $archivo->nombre = $nombreArchivo;
                $archivo->ruta = $rutaArchivo;
                $archivo->expediente_id = $expediente->id; // Relacionar con el expediente recién creado
                $archivo->save();
            }
            
        }

        return redirect()->route('expedientes.index')
            ->with('success', 'Expediente creado Exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
   /* public function show($id)
    {
        $expediente = Expediente::find($id);

        return view('expediente.show', compact('expediente'));
    }*/

    public function show($id)
    {
        // Cargar el expediente junto con la relación de archivos
        $expediente = Expediente::with('archivos')->find($id);
        
        // Pasar los datos del expediente a la vista
        return view('expediente.show', compact('expediente'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expediente = Expediente::find($id);

        return view('expediente.edit', compact('expediente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Expediente $expediente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expediente $expediente)
    {
        // Validar la solicitud
        $request->validate(Expediente::$rules);

        // Actualizar los atributos del expediente
        $expediente->update($request->all());

        // Obtener los archivos enviados en la solicitud
        $files = $request->file('files');

        // Verificar si se enviaron archivos en la solicitud
        if ($files) {
            // Recorrer los archivos y actualizar la relación con el expediente
            foreach($files as $file) {
                // Guardar el archivo en el sistema de archivos
                if(Storage::putFileAs('/public/'.$expediente->id.'/',$file,$file->getClientOriginalName())){
                    $nombreArchivo = $file->getClientOriginalName(); // Nombre original del archivo
                    $rutaArchivo = $file->store('archivos'); // Ruta donde se guardará el archivo

                    // Crear un nuevo registro de archivo y relacionarlo con el expediente
                    $archivo = new Archivo();
                    $archivo->nombre = $nombreArchivo;
                    $archivo->ruta = $rutaArchivo;
                    $archivo->expediente_id = $expediente->id; // Relacionar con el expediente recién creado
                    $archivo->save();
                }
            }
        }

        return redirect()->route('expedientes.index')
            ->with('success', 'Expediente editado Exitosamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $expediente = Expediente::find($id)->delete();

        return redirect()->route('expedientes.index')
            ->with('success', 'Expediente eliminado Exitosamente.');
    }
}
