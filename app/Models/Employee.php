<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable =['company_id','name','surname','age','employable_type','employable_id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function employable()
    {
        return $this->morphTo();
    }

}
