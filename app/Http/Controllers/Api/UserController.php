<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;


class UserController extends Controller
{
    private $UserService;

    public function __construct(UserService $UserService)
    {
        $this->UserService = $UserService;
    }
    public function index()
    {
        return $this->UserService->index();
    }

    public function show($id)
    {
        return $this->UserService->show($id);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        return $this->UserService->update($request, $id);
    }

}
