<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SellerResource;
use App\Models\Seller;


class SellerController extends Controller
{
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

}
