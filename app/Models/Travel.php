<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory, Sluggable, HasUuids;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_public',
        'number_of_days'
    ];

    protected $table = 'travels';

    public function tours()
    {
        return $this->hasMany(Tour::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    // Accessor
    public function getNumberOfNightsAttribute()
    {
        return $this->attributes['number_of_days'] - 1;
    }
}
