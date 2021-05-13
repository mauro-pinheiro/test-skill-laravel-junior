<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function create(Request $request){
        $request->validate([
            'token_name' => 'required|unique:personal_access_tokens,name',
        ]);
        $token = $request->user()->createToken($request->token_name);

        return ['token' => $token->plainTextToken];
    }

    public function revoke(Request $request){
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function revokeAll(Request $request){
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
