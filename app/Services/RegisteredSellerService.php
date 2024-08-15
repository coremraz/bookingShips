<?php
namespace App\Services;

use App\Http\Requests\Api\LoginUserRequest;
use App\Http\Requests\Api\RegisterUserRequest;
use App\Models\Seller;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredSellerService extends Service
{
    use ApiResponses;
    public function __construct(Seller $model)
    {
        $this->model = $model;
    }

    public function register(RegisterUserRequest $request)
    {
        $request->validated($request->all());
        $seller = new Seller($request->all());
        $seller->save();

        Auth::login($seller);
        $token = $seller->createToken('auth_token')->plainTextToken;

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

        $seller = Seller::where('email', $request->email)->first();

        if (!$seller || !Hash::check($request->password, $seller->password)) {
            return $this->error('Invalid credentials', '', 401);
        }

        Auth::login($seller);

        $token = $seller->createToken('auth_token')->plainTextToken;
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
