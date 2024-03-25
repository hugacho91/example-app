<?php


namespace App\Http\Controllers;

use App\Models\Expediente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


use App\Models\Delegacione;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        // Obtener el número de elementos por página
        $perPage = $request->input('perPage', 10);

        // Obtener los expedientes ordenados por fecha de forma descendente
        $expedientes = $this->getFilteredExpedientes($perPage);

        // Obtener los datos para el gráfico de expedientes por mes
        $expedientesPorMes = $this->getExpedientesPorMes();

        // Obtener los datos para el gráfico de expedientes por motivo
        $expedientesPorMotivo = $this->getExpedientesPorMotivo();

         // Obtener los datos para el gráfico de expedientes por estado
         $expedientesPorEstado = $this->getExpedientesPorEstado();

        // Pasar los datos a la vista
        return view('dashboard', compact('expedientes', 'perPage', 'expedientesPorMes', 'expedientesPorMotivo','expedientesPorEstado'));
    }

    // Función para obtener los expedientes filtrados
    private function getFilteredExpedientes($perPage)
    {
        // Obtener el ID de la delegación del usuario actual
        $idDelegacionUsuario = auth()->user()->delegacion_id;

        // Obtener el ID de la sección del usuario actual
        $idSeccionUsuario = auth()->user()->seccion_id;

        // Verificar si el usuario actual es de la delegación Santa Rosa
        if ($this->isUserFromSantaRosa()) {
            // Si es de la delegación Santa Rosa, mostrar todos los expedientes
            $query = Expediente::query();
        } else {
            // Si no es de la delegación Santa Rosa, mostrar solo los expedientes de su delegación y sección
            $query = Expediente::where('delegacion_id', $idDelegacionUsuario)
                                ->where('seccion_id', $idSeccionUsuario);
        }

        // Ejecutar la consulta paginada
        $expedientes = $query->orderBy('fecha_entrada', 'desc')->paginate($perPage);

        return $expedientes;
    }

    // Función para verificar si el usuario es de la delegación Santa Rosa
    private function isUserFromSantaRosa()
    {
        // Obtener la delegación del usuario actual
       // $delegacionUsuario = auth()->user()->delegacion;

        // Obtener el ID de la delegación del usuario actual
        $idDelegacionUsuario = auth()->user()->delegacion_id;

        // Obtener el ID de la sección del usuario actual
        $idSeccionUsuario = auth()->user()->seccion_id;

    // Obtener la delegación del usuario actual
    $delegacionUsuario = Delegacione::find($idDelegacionUsuario);


        // Verificar si la delegación del usuario es Santa Rosa
        return $delegacionUsuario && $delegacionUsuario->nombre === 'Santa Rosa';
    }

    // Función para obtener los expedientes por mes
    private function getExpedientesPorMes()
    {
        // Obtener el año actual
        $year = Carbon::now()->year;

        // Obtener los expedientes filtrados
        $expedientes = $this->getFilteredExpedientesForCharts();

        // Consulta para obtener el número de expedientes creados por mes del año actual
        $expedientesPorMes = $expedientes->select(
            DB::raw('MONTH(fecha_entrada) as mes'),
            DB::raw('COUNT(*) as total')
        )
        ->whereYear('fecha_entrada', $year)
        ->groupBy(DB::raw('MONTH(fecha_entrada)'))
        ->orderBy(DB::raw('MONTH(fecha_entrada)'))
        ->get();

        // Arreglo para almacenar los datos del gráfico
        $expedientesCreados = [];

        // Llenar el arreglo con los datos de la consulta
        foreach (range(1, 12) as $mes) {
            $expedientesCreados[$mes] = 0; // Inicializar cada mes con 0 expedientes
        }

        foreach ($expedientesPorMes as $expedientePorMes) {
            $mes = $expedientePorMes->mes;
            $expedientesCreados[$mes] = $expedientePorMes->total;
        }

        return $expedientesCreados;
    }

    // Función para obtener los expedientes para los gráficos
    private function getFilteredExpedientesForCharts()
    {
        // Verificar si el usuario es de la delegación Santa Rosa
        if ($this->isUserFromSantaRosa()) {
            // Si es de la delegación Santa Rosa, mostrar todos los expedientes
            $query = Expediente::query();
        } else {
            // Si no es de la delegación Santa Rosa, mostrar solo los expedientes de su delegación y sección
            $query = Expediente::where('delegacion_id', auth()->user()->delegacion_id)
                                ->where('seccion_id', auth()->user()->seccion_id);
        }

        return $query;
    }

    // Función para obtener los expedientes por motivo
    private function getExpedientesPorMotivo()
    {
        // Obtener los expedientes filtrados
        $expedientes = $this->getFilteredExpedientesForCharts();

        // Consulta para obtener el número de expedientes por motivo
        $expedientesPorMotivo = $expedientes->select(
            DB::raw('COALESCE(NULLIF(motivo, ""), "Sin Motivo") as motivo'),
            DB::raw('COUNT(*) as total')
        )
        ->groupBy('motivo')
        ->get();
    
        return $expedientesPorMotivo;
    }

    // Función para obtener los expedientes por estado
    private function getExpedientesPorEstado()
    {
        // Verificar si el usuario es de la delegación Santa Rosa
        if ($this->isUserFromSantaRosa()) {
            // Si es de la delegación Santa Rosa, mostrar todos los expedientes
            $query = Expediente::query();
        } else {
            // Si no es de la delegación Santa Rosa, mostrar solo los expedientes de su sección
            $query = Expediente::where('seccion_id', auth()->user()->seccion_id);
        }

        // Consulta para obtener el número de expedientes por estado
        $expedientesPorEstado = $query->select(
            'estado',
            DB::raw('COUNT(*) as total')
        )
        ->groupBy('estado')
        ->get();

        // Convertir los valores de 'total' a enteros
    $expedientesPorEstado->transform(function ($item, $key) {
        $item->total = intval($item->total);
        return $item;
    });

        return $expedientesPorEstado;
    }
}
