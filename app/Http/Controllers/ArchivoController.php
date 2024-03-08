<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
{
    // Otros métodos como index, create y store

    public function ver($id)
    {
        $archivo = Archivo::findOrFail($id);
        // Aquí puedes devolver la vista que muestre el archivo, por ejemplo:
        return response()->file(storage_path('app/' . $archivo->ruta));
    }

    public function descargar($id)
    {
        $archivo = Archivo::findOrFail($id);
        // Aquí puedes devolver la descarga del archivo, por ejemplo:
        return response()->download(storage_path('app/' . $archivo->ruta), $archivo->nombre);
    }

    /*public function eliminar($id)
    {
        $archivo = Archivo::findOrFail($id);

        // Eliminar el archivo del sistema de archivos
        Storage::delete($archivo->ruta);

        // Eliminar el registro de archivo de la base de datos
        $archivo->delete();

        return redirect()->back();
    }*/

    public function eliminar($id)
    {
        $archivo = Archivo::findOrFail($id);

        // Eliminar el archivo del sistema de archivos
        Storage::delete($archivo->ruta);

        // Eliminar el registro de archivo de la base de datos
        $archivo->delete();

        // Devolver una respuesta JSON indicando que el archivo se eliminó correctamente
        return response()->json(['success' => true]);
    }

    /* public function eliminar($id)
{
    try {
        $archivo = Archivo::findOrFail($id);

        // Eliminar el archivo del sistema de archivos
        Storage::delete($archivo->ruta);

        // Eliminar el registro de archivo de la base de datos
        $archivo->delete();

        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
    }
}*/
}