<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\SettingResource;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $settings = Setting::get();
        
        if($settings) return ApiResponse::success(200,'Successfully', SettingResource::collection($settings));
    }
}
