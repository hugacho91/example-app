<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds. 
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Empleado']);

        Permission::create(['name' => 'actividades.index', 'description' => 'Actividades - Ver'])->syncRoles([$role1]);

        Permission::create(['name' => 'delegaciones.create', 'description' => 'Delegaciones - Crear'])->syncRoles([$role1]);
        Permission::create(['name' => 'delegaciones.destroy', 'description' => 'Delegaciones - Eliminar'])->syncRoles([$role1]);
        Permission::create(['name' => 'delegaciones.edit', 'description' => 'Delegaciones - Editar'])->syncRoles([$role1]);
        Permission::create(['name' => 'delegaciones.index', 'description' => 'Delegaciones - Ver'])->syncRoles([$role1]);

        Permission::create(['name' => 'expedientes.create', 'description' => 'Expedientes - Crear'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'expedientes.destroy', 'description' => 'Expedientes - Eliminar'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'expedientes.edit', 'description' => 'Expedientes - Editar'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'expedientes.index', 'description' => 'Expedientes - Ver'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'roles.create', 'description' => 'Roles - Crear'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.destroy', 'description' => 'Roles - Eliminar'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.edit', 'description' => 'Roles - Editar'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.index', 'description' => 'Roles - Ver'])->syncRoles([$role1]);

        Permission::create(['name' => 'secciones.create', 'description' => 'Secciones - Crear'])->syncRoles([$role1]);
        Permission::create(['name' => 'secciones.destroy', 'description' => 'Secciones - Eliminar'])->syncRoles([$role1]);
        Permission::create(['name' => 'secciones.edit', 'description' => 'Secciones - Editar'])->syncRoles([$role1]);
        Permission::create(['name' => 'secciones.index', 'description' => 'Secciones - Ver'])->syncRoles([$role1]);

        Permission::create(['name' => 'users.create', 'description' => 'Usuarios - Crear'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.destroy', 'description' => 'Usuarios - Eliminar'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.edit', 'description' => 'Usuarios - Editar'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.index', 'description' => 'Usuarios - Ver'])->syncRoles([$role1]);

    }
}
