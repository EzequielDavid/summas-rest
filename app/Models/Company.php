<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','telephone'];
    protected $withCount = ['employees'];
    protected $casts=[
        'created_at'=>'datetime:d-m-Y',
        'updated_at'=>'datetime:d-m-Y',
        ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
