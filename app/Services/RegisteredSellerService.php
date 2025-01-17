<?php
namespace App\Services;

use App\Http\Requests\Api\LoginUserRequest;
use App\Http\Requests\Api\RegisterUserRequest;
use App\Models\Seller;
use App\Models\User;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredSellerService extends RegisteredUserService
{
    public function __construct(Seller $seller)
    {
        parent::__construct($seller);
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
}
