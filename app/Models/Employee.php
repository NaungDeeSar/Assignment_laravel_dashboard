<?php

namespace App\Models;

use App\Models\city;
use App\Models\state;
use App\Models\Position;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function state()
    {
        return $this->belongsTo(state::class);
    }
    public function city()
    {
        return $this->belongsTo(city::class);
    }
}
