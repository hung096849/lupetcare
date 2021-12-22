<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Sms extends Model
{
    use HasFactory, Sortable;
    protected $table = "sms";
    protected $fillable = [
        'order_code', 'name', 'content', 'phone'
    ];

    public $sortable = ['order_code', 'name', 'phone'];
}
