<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Delegacione;
use App\Models\Seccione;
use Spatie\Permission\Models\Role;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);

        return view('user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();

        $roles = Role::all();

        $delegaciones= Delegacione::pluck('nombre','id');
        $secciones= Seccione::pluck('nombre','id');

        return view('user.create', compact('user','roles','delegaciones','secciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(User::$rules);

        // Inicializar $data como un arreglo vacío
		$data = [];

		// Obtener todos los datos del formulario y asignarlos a $data
		$data = $request->all();

        // Verificar y establecer los campos como nulos si vienen con el valor 0
        $nullableFields = ['delegacion_id','seccion_id'];
        foreach ($nullableFields as $field) {
            if ($data[$field] == 0) {
                $data[$field] = null;
            }
        }

        $user = User::create($data);

        return redirect()->route('users.index')
            ->with('success', 'Usuario creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        $roles = Role::all();
        $delegaciones= Delegacione::pluck('nombre','id');
        $secciones= Seccione::pluck('nombre','id');

        return view('user.edit', compact('user','roles','delegaciones','secciones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
       // request()->validate(User::$rules);

        // Inicializar $data como un arreglo vacío
		$data = [];

		// Obtener todos los datos del formulario y asignarlos a $data
		$data = $request->all();

        // Verificar y establecer los campos como nulos si vienen con el valor 0
        $nullableFields = ['delegacion_id','seccion_id'];
        foreach ($nullableFields as $field) {
            if ($data[$field] == 0) {
                $data[$field] = null;
            }
        }

        $user->update($data);

        $user->roles()->sync($request->roles);

        return redirect()->route('users.index')
            ->with('success', 'Usuario actualizado exitosamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'Ususario eliminado exitosamente.');
    }
}
