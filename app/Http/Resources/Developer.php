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
            'developer_id'=>$this->developer_id,
            'languaje'=>$this->languaje,
            'created'   => $this->created_at->diffForHumans(),
            'created_at'=> $this->created_at->format('d-m-y'),
            'updated_at'=> $this->updated_at->format('d-m-y'),
            'employee'=> new EmployeeResources(Employee::find($this->developer_id)),
        ];
    }
}
