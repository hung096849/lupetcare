<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table ='comments';

    protected $fillable = [
        'customer_id', 'service_id', 'content'
    ];

    public function customer()
    {
        return $this->belongsTo(Customers::class, 'customer_id', 'id');
    }

    public function serivce()
    {
        return $this->belongsTo(Services::class, 'service_id', 'id');
    }
}
