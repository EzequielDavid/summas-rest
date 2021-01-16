<?php

namespace App\Http\Resources;

use App\Models\Designer;
use App\Models\Developer;
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
            'quantity_of_employees'=> $this->employees_count,
            'developers'=> $this->employees()->where('employable_type',Developer::class)->count(),
            'designers'=> $this->employees()->where('employable_type',Designer::class)->count(),
            'created'   => $this->created_at->diffForHumans(),
            'created_at'=> $this->created_at->format('d-m-Y'),
            'updated_at'=> $this->updated_at->format('d-m-Y'),
        ];
    }
}
