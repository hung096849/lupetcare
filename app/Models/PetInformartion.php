<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class PetInformartion extends Model
{
    use Sluggable;
    use HasFactory;

    protected $table = 'pet_informartions';
    protected $fillable = [
        'name', 'code', 'weight', 'gender'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
