<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Designer extends JsonResource
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
            'type'=>$this->type,
            'created'   => $this->created_at->diffForHumans(),
            'created_at'=> $this->created_at->format('d-m-y'),
            'updated_at'=> $this->updated_at->format('d-m-y'),
        ];
    }
}
