<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
           'email' => 'required',
           'password' => 'required'
        ]);

        if (!$token = auth()->attempt($request->only(['email', 'password']))) {
            return response()->json([
               'errors' => [
                   'email' => ['Sorry we couldn\'t sign you in with those details']
               ]
            ], 422);
        };

        dump($token);
    }
}
