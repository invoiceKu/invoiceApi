<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
   
    public function register(Request $request)
    {
       
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'no_hp' => 'required|string|max:15',
        ]);

       
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Gunakan Hash::make()
            'no_hp' => $request->no_hp,
            'type_account' => 0,
            'type_user' => 0,
            'foto_profil' => '',
            'versi' => env('VERSI_APP'),
            'saldo' => 0,
            'saldo_referral' => 0,
            'storage_size' => 500,
            'status_hp' => 0,
            'device_name' => '',
            'device_type' => '',
            'os_version' => '',
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;
        $user->api_token = $token;
        $user->save();

        return response()->json([
            'message' => 'Registrasi berhasil',
            'token' => $token,
            'user' => $user,
        ], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Email atau password salah.'], 401);
        }
        $user->tokens()->delete();
        $token = $user->createToken('auth_token')->plainTextToken;
        $user->api_token = $token;
        $user->save();
        return response()->json([
            'message' => 'Login berhasil',
            'token' => $token,
            'user' => $user,
        ], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout berhasil'
        ], 200);
    }

    public function dataUser()
    {
        $data = User::all();
        return view('data-User', ['data' => $data]);
    }

    function showUser()
    {
        return view('User');
    }
}