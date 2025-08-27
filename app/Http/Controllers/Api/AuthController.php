<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Bevi;

use App\Http\Resources\UserResource;

class AuthController extends Controller
{
    public function login(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $token = $user->createToken('api-token')->plainTextToken;

            return response()->json([
                'user' => new UserResource($user),
                'token' => $token,
            ]);
        } else {
            return response()->json([
                'message' => 'invalid credentials'
            ]);
        }
    }

    public function logout() {
        $user = Auth::user();
        $user->tokens()->delete(); // Delete all the user's tokens

        return response()->json([
            'message' => 'Logged out successfully'
        ]);
    }

    public function index($param1, $param2, $param3)
    {
       $results = Bevi::callspKPIDashboard_V2($param1, $param2, $param3);

        return response()->json($results);
    }
}
