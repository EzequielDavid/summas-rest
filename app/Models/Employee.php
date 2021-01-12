<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable =['name','surname','age'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function employable()
    {
        return $this->morphTo();
    }

    public function profile()
    {
        return $this->morphTo('profileable');
    }
}
