<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Services extends Model
{
    use HasFactory,Sluggable;

    protected $table = "services";

    protected $fillable = [
        'category_id',
        'service_name',
        'image',
        'price',
        'price_sale',
        'detail',
        'description',
        'status',
        'time',
        'slug',
        'delete_at'
    ];

    function uploadFile($file,$folder) {
        $filenameWithExt = $file->getClientOriginalName();
        //Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just ext
        $extension = $file->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        // Upload Image
        $path = $file->storeAs("public/$folder", $fileNameToStore);
    
        return $fileNameToStore;
    }

    public function sluggable() : array{
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    
    public function categories()
    {
        return $this->belongsTo(CategoriesServices::class, 'category_id', 'id');
    }
}
