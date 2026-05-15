<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountAjaxController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Incorrect email or password.',
            ], 401);
        }

        // Log in for the session (nomination controller will see Auth::id())
        Auth::login($user);

        return response()->json([
            'success' => true,
            'user_id' => $user->id,
            'name'    => $user->name ?? $user->email,
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'email'    => 'required|email|unique:users,email',
            'phone'    => 'required|string|max:30',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name'     => explode('@', $request->email)[0],
            'email'    => $request->email,
            'phone'    => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return response()->json([
            'success' => true,
            'user_id' => $user->id,
            'name'    => $user->name,
        ]);
    }
}