<?php

namespace App\Http\Controllers\Api;

use App\Services\SellerService;
use App\Http\Requests\Api\UpdateUserRequest;
use App\Http\Resources\SellerResource;
use App\Models\Seller;
use App\Services\UserService;


class SellerController extends UserController
{

    private $SellerService;

    public function __construct(SellerService $SellerService)
    {
        $this->SellerService = $SellerService;
    }

        public function index()
    {
        $sellers = Seller::paginate();

        return SellerResource::collection($sellers);
    }

    public function show($id)
    {
        $sellers = Seller::find($id);

        return SellerResource::make($sellers);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        return $this->SellerService->update($request, $id);
    }

}
