<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    use HasFactory;
    protected $guarded=[];
    
    public function state(){
        return $this->belongsTo(state::class,'state_id');
    }

    public function employee()
    {
        return $this->hasMany(Employee::class);
    }
}
