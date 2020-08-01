<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getUser()
    {
        return Auth::user();
    }

    public function logout()
    {
        Auth::logout();

        return response()->json([
            'success' => true
        ]);
    }
}
