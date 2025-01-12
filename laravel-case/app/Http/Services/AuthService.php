<?php

namespace App\Http\Services;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class AuthService
{
    /**
     * @param array $payload
     * @return JsonResponse
     */
    public function login(array $payload): JsonResponse
    {
        if (Auth::attempt($payload)) {
            return response()->json([
                'ok' => true,
                'token' => auth()->user()->createToken('API Token')->plainTextToken,
            ]);
        }
        return response()->json([
            'ok' => false,
            'message' => trans('response.auth_failed'),
        ], ResponseAlias::HTTP_UNAUTHORIZED);
    }

    /**
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        $user = auth()->user();
        $user->tokens->each(function ($token) {
            $token->delete();
        });
        return response()->json(['ok' => true]);
    }

}
