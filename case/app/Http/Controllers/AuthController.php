<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * @var AuthService
     */
    protected AuthService $auth_service;

    /**
     * @param AuthService $auth_service
     */
    public function __construct(AuthService $auth_service)
    {
        $this->auth_service = $auth_service;
    }

    /**
     * @param LoginRequest $request
     * @return JsonResponse
     * @unauthenticated
     * @example
     */
    public function login(LoginRequest $request): JsonResponse
    {
        return $this->auth_service->login($request->validated());
    }

    /**
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        return $this->auth_service->logout();
    }
}
