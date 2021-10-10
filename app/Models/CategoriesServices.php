<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class CategoriesServices extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = "categories_services";
    protected $fillable = [
        'name',
        'slug',
        'delete_at'
    ];


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function services()
    {
        return $this->hasMany(Services::class, 'category_id', 'id');
    }
}
