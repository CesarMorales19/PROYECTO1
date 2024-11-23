<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $user = Auth::user();

            if ($user->role === 'admin') {
                if ($request->ajax()) {
                    return response()->json(['success' => true, 'redirect' => route('products.index')]);
                }
                return redirect()->route('products.index');
            }

            // Si el usuario no es admin, redirigir a la página de inicio
            if ($request->ajax()) {
                return response()->json(['success' => true, 'redirect' => route('home')]);
            }
            return redirect()->route('home');
        }

        // Si las credenciales son incorrectas, devolver un error en formato JSON para AJAX
        if ($request->ajax()) {
            return response()->json(['success' => false, 'message' => 'Las credenciales no coinciden con nuestros registros.'], 401);
        }

        return redirect()->back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.'
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Has cerrado sesión correctamente.');
    }
}

