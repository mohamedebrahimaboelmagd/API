<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Models\Ad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdsRequest;
use App\Http\Resources\AdResource;

class AdController extends Controller
{
    public function index()
    {
        $allAds = Ad::latest()->paginate(1);
        if (count($allAds) > 0) {
            return ApiResponse::success(200, 'success', AdResource::collection($allAds));
        }
    }

    public function latest()
    {
        $latestAds = Ad::latest()->take(2)->get();

        if (count($latestAds) > 0) {
            return ApiResponse::success(200, 'this is latest Ads', AdResource::collection($latestAds));
        }
        return ApiResponse::success(200, 'no latest yet', []);
    }


    public function domain($domain_id)
    {
        $ads = Ad::where('domain_id', $domain_id)->latest()->get();

        if (count($ads) > 0) {
            return ApiResponse::success(200, 'Successfully', AdResource::collection($ads));
        }
        return ApiResponse::success(200, 'empty', []);
    }

    public function search(Request $request)
    {
        $word = $request->has('search') ? $request->input('search') : null;

        $ads = Ad::when($word != null, function ($q) use ($word) {
            $q->where('title', 'like', '%' . $word . '%');
        })->latest()->get();

        if (count($ads) > 0) {
            return ApiResponse::success(200, 'search completed', AdResource::collection($ads));
        }
    }


    public function createAds(AdsRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;

        $record = Ad::create($data);

        if ($record) return ApiResponse::success(201, 'Ads Created Successfully', new AdResource($record));
    }

    public function update(AdsRequest $request, $adsId)
    {
        $ads = Ad::findOrFail($adsId);
        if ($ads->user_id != $request->user()->id)
        {
            return ApiResponse::success(403, 'Forbidden YA M3alem', []);
        }
        
    }
}
