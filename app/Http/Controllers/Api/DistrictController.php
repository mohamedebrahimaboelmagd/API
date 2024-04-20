<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\DistrictResource;

class DistrictController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $city_id)
    {
        $district = District::where('city_id', $city_id)->get();
        if (count($district) > 0) {
            return ApiResponse::success(200, 'Districts get successfully', DistrictResource::collection($district));
        }
        return ApiResponse::success(200, 'Districts is empty', []);
    }
}
