<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Kyslik\ColumnSortable\Sortable;

class PetInformartion extends Model
{
    use Sluggable, Sortable;
    use HasFactory;

    protected $table = 'pet_informartions';
    protected $fillable = [
        'name', 'code', 'weight', 'gender'
    ];

    public $sortable = ['name','code'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
