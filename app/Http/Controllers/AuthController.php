<?php

namespace App\Http\Controllers;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

// use Validator;

class AuthController extends Controller
{
    //Register Controller
    public function register(Request $request){

        if(User::where('email', $request->email)->exists()){
            return response()->json([
                'status' => 'email already',
                'message' => 'Email sudah terdaftar!'
            ], 403);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'string|max:255',
            'usia' => 'required|integer|min:1',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Pastikan password di-hash
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat, // Simpan alamat dalam format JSON
            'usia' => $request->usia,
            'versi' => env('VERSI_APP'),
            'status_daftar' => 0,
            'foto_profil' => '',
            'device_name' => '',
            'os_version' => '',
        ]);

        $token = JWTAuth::fromUser($user);
        session()->put('api_token', $token);
        if(!$token){
            return response()->json(['error' => 'Failed to generate token'], 422);
        }

        return response()->json([
            'email' => $user->email, // Bisa menggunakan email sebagai username
            'no_hp' => $user->no_hp,
            'alamat' => json_decode($user->alamat), // Mengambil data alamat yang sudah disimpan dalam format JSON
            'usia' => $user->usia,
            'foto_profil' => [$user->foto_profil], // Membungkus foto_profil dalam array
            'token' => $token, // Token JWT yang dibuat
            'status_daftar' => $user->status_daftar,
            // 'device' => $device,
        ], 201);
    }
    public function dataUser()
    {
        $data = User::all(); // Mengambil semua data pengguna
        return view('data-User', ['data' => $data]);
    }
    function showUser(){
        return view('User');
    }

    //Login Controller
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if(! $user || ! Hash::check($request->password, $user->password)){
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'message' => 'Login Success',
            'token' => $token, 
            'user' => $user,
        ], 200);
    }  

    //logout controller
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logout Success'
        ], 200);
    }
}