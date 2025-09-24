<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
   use HasFactory,HasUuids;
   protected $fillable = ['name','travels_id','starting_date','ending_date','price'];
 public function getPriceAttribute($value)
{
    return $value / 100; 
}

public function setPriceAttribute($value)
{
    $this->attributes['price'] = $value * 100; 
}

}
