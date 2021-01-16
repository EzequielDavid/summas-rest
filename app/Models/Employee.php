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

    public function averageAge()
    {
       /* $ageSum=0;
        $average=0;
            $employees = self::all();
        foreach($employees as $employee)
        {
            $ageSum += $employee->age;
            $average = $ageSum/$employees->count();
        }
            return intval($average);*/
    }

}
