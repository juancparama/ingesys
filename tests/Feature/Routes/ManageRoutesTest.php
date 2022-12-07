<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class ManageRoutesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_manage()
    {

        $user = User::factory()->create()->assignRole('mantenimiento');
        $response = $this->actingAs($user)->get('/manage');
        $response->assertStatus(200);

        $user = User::factory()->create()->assignRole('prevencion');
        $response = $this->actingAs($user)->get('/manage');
        $response->assertStatus(200);
    }

    public function test_manager_unauthorized()
    {
        $user = User::factory()->create()->assignRole('mantenimiento');

        $this->actingAs($user)
            ->get('/ticket')
            -> assertForbidden();

        $this->actingAs($user)
            ->get('/admin')
            -> assertForbidden();

        $user = User::factory()->create()->assignRole('prevencion');

        $this->actingAs($user)
            ->get('/ticket')
            -> assertForbidden();
    
        $this->actingAs($user)
            ->get('/admin')
            -> assertForbidden();
    }

}
