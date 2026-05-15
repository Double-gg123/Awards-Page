<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function ajaxLogin(Request $request)
    {
        $request->validate(['email' => 'required|email', 'password' => 'required']);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return response()->json([
                'success' => true,
                'user_id' => $user->id,
                'name'    => $user->name ?? $user->email,
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Invalid credentials.'], 401);
    }

    public function ajaxRegister(Request $request)
    {
        $request->validate([
            'email'    => 'required|email|unique:users,email',
            'phone'    => 'required|string',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name'     => $request->email,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return response()->json([
            'success' => true,
            'user_id' => $user->id,
            'name'    => $user->email,
        ]);
    }
}