<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    // use RefreshDatabase;

    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_users_can_authenticate_using_the_login_screen()
    {
        $user = User::factory()->create()->assignRole('usuario');

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        if (Auth::user()->roles[0]->name=='admin') {
            $response->assertRedirect(RouteServiceProvider::HOME . "admin");

        } elseif (($user->hasRole('mantenimiento')) || ($user->hasRole('prevencion'))) {
            $response->assertRedirect(RouteServiceProvider::HOME . "manage");

        } elseif (Auth::user()->roles[0]->name=='usuario') {
            $response->assertRedirect(RouteServiceProvider::HOME . "ticket");
        } 

    }

    public function test_users_can_not_authenticate_with_invalid_password()
    {
        $user = User::factory()->create()->assignRole('usuario');

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }
}
