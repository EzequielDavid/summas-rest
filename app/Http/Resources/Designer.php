<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Employee as EmployeeResources;
use App\Models\Employee;

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
            'designer_id'=>$this->designer_id,
            'type'=>$this->type,
            'created'   => $this->created_at->diffForHumans(),
            'created_at'=> $this->created_at->format('d-m-y'),
            'updated_at'=> $this->updated_at->format('d-m-y'),
            'employee'=> new EmployeeResources(Employee::find($this->designer_id)),
        ];
    }
}
