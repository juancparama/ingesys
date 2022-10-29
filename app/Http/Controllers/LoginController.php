<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login ()
    {
        $user = Auth::user();
        
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.index');
        } elseif (($user->hasRole('mantenimiento')) || ($user->hasRole('prevencion'))) {
            return redirect()->route('manage.index');
        } elseif ($user->hasRole('usuario')) {
            return redirect()->route('ticket.index');
        } 
        // else {
        //     return view ('auth.login');
        // }
    }
}




