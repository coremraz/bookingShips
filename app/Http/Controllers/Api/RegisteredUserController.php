<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginUserRequest;
use App\Http\Requests\Api\RegisterUserRequest;
use App\Http\Resources\UserResource;
use App\Services\RegisteredUserService;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    private $RegisteredUserService;

    public function __construct(RegisteredUserService $RegisteredUserService)
    {
        $this->RegisteredUserService = $RegisteredUserService;
    }

    public function store(RegisterUserRequest $request)
    {
        $response = $this->RegisteredUserService->register($request);
        return response()->json($response->getData(), $response->getStatusCode());
    }

    public function login(LoginUserRequest $request)
    {
        $response = $this->RegisteredUserService->login($request);
        return response()->json($response->getData(), $response->getStatusCode());
    }

    public function logout(Request $request)
    {
        $response = $this->RegisteredUserService->logout($request);
        return response()->json($response->getData(), $response->getStatusCode());
    }
}
