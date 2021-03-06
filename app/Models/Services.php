<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

// use Cviebrock\EloquentSluggable\Sluggable;,Sluggable

class Services extends Model
{
    use HasFactory, Sortable;

    protected $table = "services";

    const SERVICE_HOT = 0;
    const SERVICE_NEW = 1;

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

    public $sortable = ['id', 'service_name'];

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
