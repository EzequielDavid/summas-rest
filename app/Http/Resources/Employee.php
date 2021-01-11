<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Developer as DeveloperResources;
use App\Models\Developer;
use App\Http\Resources\Designer as DesignerResources;
use App\Models\Designer;

class Employee extends JsonResource
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
            'id'        => $this->id,
            'company_id'=>$this->company_id,
            'name'      => $this->name,
            'surname'   => $this->surname,
            'age'       => $this->age,
            'created'   => $this->created_at->diffForHumans(),
            'created_at'=> $this->created_at->format('d-m-y'),
            'updated_at'=> $this->updated_at->format('d-m-y'),
            'developer' => DeveloperResources::collection($this->whenLoaded('developer'))
            //'designer'  => DesignerResources::collection(Designer::with('employee')->get())

        ];
    }
}
