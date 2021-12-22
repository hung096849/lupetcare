<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    use HasFactory;
    protected $table = "sms";
    protected $fillable = [
        'order_code', 'name', 'content', 'phone'
    ];

    public $sortable = ['order_code', 'name', 'phone'];
}
