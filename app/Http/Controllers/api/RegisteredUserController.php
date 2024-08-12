<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Services\RegisteredUserService;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    private $RegisteredUserService;

    public function __construct(RegisteredUserService $RegisteredUserService)
    {
        $this->RegisteredUserService = $RegisteredUserService;
    }

    public function store(Request $request)
    {
        $response = $this->RegisteredUserService->register($request->all());
        return response()->json($response->getData(), $response->getStatusCode());
    }

    public function login(Request $request)
    {
        $response = $this->RegisteredUserService->login($request->all());
        return response()->json($response->getData(), $response->getStatusCode());
    }
}
