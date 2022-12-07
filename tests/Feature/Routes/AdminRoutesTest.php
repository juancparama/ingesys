<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Providers\RouteServiceProvider;

class AdminRoutesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_admin()
    {

        $user = User::factory()->create()->assignRole('admin');

        $response = $this->actingAs($user)->get('/admin');

        $response->assertStatus(200);
        // COMPROBAR QUE NO PUEDE IR A PÁGINAS DE OTROS ROLES P. EJ: TICKET
    }

    public function test_admin_unauthorized()
    {
        $user = User::factory()->create()->assignRole('admin');

        $this->actingAs($user)
            ->get('/ticket')
            -> assertForbidden();

        $this->actingAs($user)
            ->get('/manage')
            -> assertForbidden();
    }
}
