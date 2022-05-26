<?php

namespace App\Http\Resources;

use App\Http\Resources\DepartmentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PositionResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price'=>$this->price,
            'dep_id' =>new DepartmentResource($this->department),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
    
}
