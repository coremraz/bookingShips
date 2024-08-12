<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserService extends Service
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function register(array $data)
    {
        // логика регистрации пользователя
        //        $this->validate($data);
        $user = new User($data);
        $user->save();
        Auth::login($user);
        return $this->successResponse(['message' => 'User created successfully']);
    }

    public function login(array $data)
    {
        // логика авторизации пользователя
//        $this->validate($data);
        $user = User::where('email', $data['email'])->first();
        if (!$user || !Hash::check($data['password'], $user->password)) {
            return $this->errorResponse('Invalid credentials', 401);
        }
        Auth::login($user);
        $token = $user->createToken('auth_token')->plainTextToken;
        return $this->successResponse(['token' => $token]);
    }
}
