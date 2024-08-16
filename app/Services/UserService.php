<?php
namespace App\Services;

use App\Http\Requests\Api\LoginUserRequest;
use App\Http\Requests\Api\RegisterUserRequest;
use App\Http\Requests\Api\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserService extends Service
{
    use ApiResponses;
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function index()
    {
        $users = User::paginate();

        return UserResource::collection($users);
    }

    public function show($id)
    {
        $user = User::find($id);

        return UserResource::make($user);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        //Вызов UserPolicy, запрет на редактирование других пользователей

        if (!Gate::allows('update', $user)) {
            return $this->error('Unauthorized', [], 403);
        }

        $request->validated($request->all());
        $user->fill($request->all());
        $user->save();

        return $this->ok( 'success',  $user);
    }
}
