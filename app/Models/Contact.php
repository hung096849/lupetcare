<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Contact extends Model
{
    use Sortable;
    use HasFactory;

    public $fillable = [
        'name', 'phone', 'email', 'title','message'
    ];
    public $sortable = ['id','name','email'];
}
