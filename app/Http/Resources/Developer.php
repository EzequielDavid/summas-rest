<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Developer as DeveloperResources;
use App\Http\Resources\Employee as EmployeeResources;
use App\Models\Employee;

class Developer extends JsonResource
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
            'language'=>$this->language,
            'created'   => $this->created_at->diffForHumans(),
            'created_at'=> $this->created_at->format('d-m-y'),
            'updated_at'=> $this->updated_at->format('d-m-y'),
        ];
    }
}
