<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designer extends Model
{
    use HasFactory;

    protected $fillable =['designer_id','type'];

    public function employee()
    {
        return $this->belongsTo(Employee::class,'designer_id');
    }
}
