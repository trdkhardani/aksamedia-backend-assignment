<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'status' => 'error',
                'message' => 'username atau password salah'
            ]);
        }

        $user = User::where('username', $request->username)->first();
        $token = $user->createToken(Auth::user()->username, ['create', 'read', 'update', 'delete']);

        return response()->json([
            'status' => 'success',
            'message' => 'Halo, ' . $user->name,
            'data' => [
                'token' => $token->plainTextToken,
                'admin' => [
                    'id' => $user->user_id,
                    'name' => $user->name,
                    'username' => $user->username,
                    'phone' => $user->phone,
                    'email' => $user->email,
                ],
            ],
        ]);
    }
}
