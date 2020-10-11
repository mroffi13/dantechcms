<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    //

    public function formLogin()
    {
        return view('auth.login');
    }

    public function formRegister()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $response = Http::post('http://localhost:8001/login', $data);

        if ($response->successful()) {
            $callback = Http::post('http://localhost:8002/user/store', $response->json()['data'])->json();
            $user = $callback['user'];
            session()->put('user', $user);
            return redirect()->route('products');
        } else {
            return redirect()->route('form.login')->with([
                'class' => 'danger',
                'icon' => 'fas fa-ban',
                'message' => $response->json()['message']
            ]);
        }
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name'  => 'required|min:5',
            'email' => 'required|email',
            'address' => 'required',
            'password' => 'required|confirmed',
        ]);

        $data['password_confirmation'] = $request->password_confirmation;

        $response = Http::withHeaders([
            'x-api-key' => 'HrwCTKGnwDXO25ePj5UNkC1G8QOZKpGm',
            'Accept' => 'application/json'
        ])->post('http://localhost:8001/register', $data);

        if ($response->successful()) {
            return redirect()->route('form.login')->with([
                'class' => 'success',
                'icon' => 'fas fa-check',
                'message' => $response->json()['message']
            ]);
        } else {
            return back()->withErrors(['email' => $response->json()['email'][0]]);
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('form.login');
    }
}
