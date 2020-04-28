<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->flash('status', __('You have been signed out.'));
        return redirect()->route('login');
    }
}
