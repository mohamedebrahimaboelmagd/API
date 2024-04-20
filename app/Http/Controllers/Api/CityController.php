<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CityResource;

class CityController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $cities = City::get();

        if ($cities) {
            return ApiResponse::success(200, "cities Retrieved successfully", CityResource::collection($cities));
        }
        return ApiResponse::success(200, "cities is empty", []);
    }
}
