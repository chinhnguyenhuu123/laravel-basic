<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name_car'=>$this->name_car,
            'vehicles' => $this->vehicles,  
            'seat' => $this->seat,
            'distance' => $this->distance,
            'content'=>$this->content,
            'price'=>$this->price,
            'image'=>$this->image,
            // 'image_detail'=>$this->image_detail,
            // 'maximum'=>$this->maximum,
            // 'maximum_torque'=>$this->maximum_torque,
        ];
    }
    public function showallcar(): array
    {
        return [
            'id' => $this->id,
            'name_car'=>$this->name_car,
            'vehicles' => $this->vehicles,  
            'seat' => $this->seat,
            'distance' => $this->distance,
            'content'=>$this->content,
            'price'=>$this->price,
            'image'=>$this->image,
        ];
    }
    public function showdetailcar(): array
    {
        return [
            'id' => $this->id,
            // 'name_car' => $this->type,
            'vehicles' => $this->vehicles,  
            'distance' => $this->distance,
            'image_detail'=>$this->image_detail,
            'maximum'=>$this->maximum,
            'maximum_torque'=>$this->maximum_torque,
        ];
    }
}
