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
        $this->call(RoleSeeder::class);

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
            'name' => 'Zonas comunes',
        ]);

        \App\Models\Location::factory()->create([
            'name' => 'Aseos',
        ]);
        
        \App\Models\Location::factory()->create([
            'name' => 'Otras zonas',
        ]);

        // =========
        
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@ingesys.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('admin');

        \App\Models\User::factory()->create([
            'name' => 'mantenimiento',
            'email' => 'mtto@ingesys.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('mantenimiento');

        \App\Models\User::factory()->create([
            'name' => 'prevencion',
            'email' => 'prevencion@ingesys.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('prevencion');

        \App\Models\User::factory()->create([
            'name' => 'Juan García 4',
            'email' => 'juan@ingesys.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('usuario');

        \App\Models\User::factory()->create([
            'name' => 'Ana López 5',
            'email' => 'ana@ingesys.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('usuario');

        \App\Models\User::factory()->create([
            'name' => 'Juan C.',
            'email' => 'juanc@ingesys.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('usuario');

        \App\Models\User::factory(20)->create();

        \App\Models\Ticket::factory(200)->create();
        
    }
}
