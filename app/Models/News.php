<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class News extends Model
{
    use HasFactory, Sortable;

    protected $table ='news';

    protected $fillable = [
        'title', 'image', 'detail', 'slug'
    ];

    public $sortable = ['id', 'title'];

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
}
