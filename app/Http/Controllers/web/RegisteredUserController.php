<?php

namespace App\Http\Controllers\web;

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
        if ($response->getStatusCode() === 200) {
            return redirect()->route('profile');
        }
        return back()->withErrors($response->getMessage());
    }

    public function login(Request $request)
    {
        $response = $this->RegisteredUserService->login($request->all());
        if ($response->getStatusCode() === 200) {
            return redirect()->route('profile');
        }
        return back()->withErrors($response->getMessage());
    }
}
