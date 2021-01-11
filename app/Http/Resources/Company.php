<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Company extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            'telephone'=>$this->telephone,
            'created'   => $this->created_at->diffForHumans(),
            'created_at'=> $this->created_at->format('d-m-y'),
            'updated_at'=> $this->updated_at->format('d-m-y'),
        ];
    }
}
