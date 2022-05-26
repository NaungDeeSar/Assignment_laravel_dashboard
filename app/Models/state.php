<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class state extends Model
{
    use HasFactory;
    protected $guarded=[]; 

    public function Employee()
    {
        return $this->hasMany(Employee::class);
    }
}
