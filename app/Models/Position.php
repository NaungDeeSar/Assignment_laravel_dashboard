<?php

namespace App\Models;

use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Position extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function Department(){
        return $this->belongsTo(Department::class,'dep_id');
    }

    public function Employee()
    {
        return $this->hasMany(Employee::class);
    }

    
}
