<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPet extends Model
{
    use HasFactory;

    protected $table = 'order_pets';
    protected $fillable = [];

}
