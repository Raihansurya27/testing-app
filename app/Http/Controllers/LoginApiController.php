<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class LoginApiController extends Controller
{
    public function register(Request $request)
    {
        // Validasi input
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        // Buat pengguna baru
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Simpan pengguna
        $user->save();

        return response()->json(['message' => 'Pengguna berhasil terdaftar'], 201);
    }

    public function login(Request $request)
    {
        $input = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($input)) {
            return response()->json(['error' => 'Email atau kata sandi tidak valid'], 401);
        }

        return response()->json(['token' => $token]);
    }
}
