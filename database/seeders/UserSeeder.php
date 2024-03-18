<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        
        //\App\Models\User::factory(1)->create();
         \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password'=> bcrypt('Admin2024'),
         ])-> assignRole('Administrador');

         \App\Models\User::factory()->create([
            'name' => 'Empleado',
            'email' => 'empleado@gmail.com',
            'password'=> bcrypt('Empleado2024'),
         ])-> assignRole('Empleado');

    }

}

