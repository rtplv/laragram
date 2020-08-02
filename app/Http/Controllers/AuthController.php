<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getUser()
    {
        return response()->json([
            'success' => true,
            'user' => Auth::user()
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return response()->json([
            'success' => true
        ]);
    }
}
