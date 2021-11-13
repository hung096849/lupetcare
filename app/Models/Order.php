<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'customer_id', 'payment_method', 'is_paid', 'date', 'status'
    ];

    public function customer()
    {
        return $this->belongsTo(Customers::class, 'customer_id', 'id');
    }

    public function order_services()
    {
        return $this->belongsToMany(Services::class, 'order_pets', 'order_id', 'service_id');
    }

    public function order_pets()
    {
        return $this->belongsToMany(PetInformartion::class ,'order_pets', 'order_id', 'pet_id');
    }

}
