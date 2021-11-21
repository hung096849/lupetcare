<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class OrderPet extends Model
{
    use HasFactory, Sortable;

    protected $table = 'order_pets';
    protected $fillable = [
        'order_id', 'pet_id', 'service_id', 'quantity'
    ];

    public $sortable = ['order_id', 'pet_id'];    
}
