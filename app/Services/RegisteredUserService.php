<?php
namespace App\Services;

use App\Http\Requests\Api\LoginUserRequest;
use App\Http\Requests\Api\RegisterUserRequest;
use App\Models\User;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserService extends Service
{
    use ApiResponses;
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function register(RegisterUserRequest $request)
    {
        $request->validated($request->all());

        $user = new User($request->all());
        $user->save();

        Auth::login($user);
        $token = $user->createToken('auth_token')->plainTextToken;

        return $this->ok(
            'Registered',
            [
                'token' => $token
            ]
        );
    }

    public function login(LoginUserRequest $request)
    {
        $request->validated($request->all());

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return $this->error('Invalid credentials', '', 401);
        }

        Auth::login($user);

        $token = $user->createToken('auth_token')->plainTextToken;
        return $this->ok(
            'Authenticated',
            [
                'token' => $token
            ]
        );
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return $this->ok('');
    }
}
