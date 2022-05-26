<?php

namespace App\Http\Resources;

use App\Http\Resources\cityResource;
use App\Http\Resources\PositionResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'email'=>$this->email,
            'phone'=>$this->phone,
            'address'=>$this->address,
            'state'=>$this->state,
            'city'=>$this->city,
            'skill'=>$this->skill,
            'dob'=>$this->dob,
            'photo'=>url($this->photo),          
            'position_id' =>new PositionResource($this->position),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

        ];
    } 
}
