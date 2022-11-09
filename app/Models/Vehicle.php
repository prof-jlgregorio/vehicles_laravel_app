<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    //..eager loading 
    protected $with = ['brand'];

    //..define the relationship with Brand 
    public function brand(){
        return $this->belongsTo(Brand::class);
    }

}
