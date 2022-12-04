<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Crear permisos y roles
        
        $this->call(RoleSeeder::class);

        // Crear ubicaciones

        \App\Models\Location::factory()->create([
            'name' => 'Sala Gorfoli',
        ]);
        
        \App\Models\Location::factory()->create([
            'name' => 'Sala Urriellu',
        ]);

        \App\Models\Location::factory()->create([
            'name' => 'Sala Pienzu',
        ]);

        \App\Models\Location::factory()->create([
            'name' => 'Sala Torrecerredo',
        ]);

        \App\Models\Location::factory()->create([
            'name' => 'Zonas comunes',
        ]);

        \App\Models\Location::factory()->create([
            'name' => 'Aseos',
        ]);
        
        \App\Models\Location::factory()->create([
            'name' => 'Otras zonas',
        ]);

        // Crear usuarios
        
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@ingesys.tk',
            'password' => bcrypt('admin'),
        ])->assignRole('admin');

        \App\Models\User::factory()->create([
            'name' => 'mantenimiento',
            'email' => 'mantenimiento@ingesys.tk',
            'password' => bcrypt('mantenimiento'),
        ])->assignRole('mantenimiento');

        \App\Models\User::factory()->create([
            'name' => 'prevencion',
            'email' => 'prevencion@ingesys.tk',
            'password' => bcrypt('prevencion'),
        ])->assignRole('prevencion');

        // \App\Models\User::factory()->create([
        //     'name' => 'Juan C.',
        //     'email' => 'juanc@ingesys.tk',
        //     'password' => bcrypt('juanc'),
        // ])->assignRole('usuario');

        // \App\Models\User::factory()->create([
        //     'name' => 'Ana López',
        //     'email' => 'ana@ingesys.tk',
        //     'password' => bcrypt('ana'),
        // ])->assignRole('usuario');

        for ($i=0; $i < 20; $i++) { 
            $user= \App\Models\User::factory()->create();
            $user->assignRole('usuario');
        }

        // Crear incidencias

        // \App\Models\Ticket::factory(200)->create();

        // Eliminar incidencias que no cumplen requisitos

        $this->call(IncidenciasRemoveSeeder::class);
        
    }
}
