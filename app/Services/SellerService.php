<?php
namespace App\Services;

use App\Http\Requests\Api\UpdateUserRequest;
use App\Models\Seller;
use App\Models\User;
use App\Traits\ApiResponses;
use Illuminate\Support\Facades\Gate;


class SellerService extends UserService
{
    use ApiResponses;
    public function __construct(Seller $seller)
    {
        // Вызываем конструктор родительского сервиса
        parent::__construct($seller);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $seller = User::findOrFail($id);

        //Вызов UserPolicy, запрет на редактирование других пользователей

        Gate::authorize('update', $seller);

        $request->validated($request->all());
        $seller->fill($request->all());
        $seller->save();

        return $this->ok( 'success',  $seller);
    }
}
