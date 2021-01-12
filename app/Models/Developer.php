<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;

    protected $fillable =['language'];

        public function employee()
    {
        return $this->morphOne(Employee::class,'employable');
    }

}
