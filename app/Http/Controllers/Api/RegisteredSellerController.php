<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginUserRequest;
use App\Http\Requests\Api\RegisterUserRequest;
use App\Services\RegisteredSellerService;
use Illuminate\Http\Request;

class RegisteredSellerController extends Controller
{
    private $RegisteredSellerService;

    public function __construct(RegisteredSellerService $RegisteredUserService)
    {
        $this->RegisteredSellerService = $RegisteredUserService;
    }

    public function store(RegisterUserRequest $request)
    {
        return $this->RegisteredSellerService->register($request);
    }

    public function login(LoginUserRequest $request)
    {
        return $this->RegisteredSellerService->login($request);
    }

    public function logout(Request $request)
    {
        return $this->RegisteredSellerService->logout($request);
    }
}
