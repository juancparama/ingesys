<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserRoutesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_user()
    {

        $user = User::factory()->create()->assignRole('usuario');

        $response = $this->actingAs($user)->get('/ticket');

        $response->assertStatus(200);
    }
    
    public function test_user_unauthorized()
    {
        $user = User::factory()->create()->assignRole('usuario');

        $this->actingAs($user)
            ->get('/manage')
            -> assertForbidden();

        $this->actingAs($user)
            ->get('/admin')
            -> assertForbidden();
    }
}
