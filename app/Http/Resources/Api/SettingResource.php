<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'counter-name1' =>   $this->counter1_name,
            'counter-count_1'=>  $this->counter1_count,
            'counter-name_2' =>  $this->counter2_name,
            'counter-count_2'=>  $this->counter2_count,
            'counter-name_3' =>  $this->counter3_name,
            'counter-count_3'=>  $this->counter3_count,
            'counter-name_4' =>  $this->counter4_name,
            'counter-count_4'=>  $this->counter4_count,
        ];
    }
}
    