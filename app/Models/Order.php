<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Order extends Model
{
    use HasFactory,Sortable;

    const STATUS_DONE = 0; //xong
    const STATUS_IN_PROCESS = 2;// chờ xếp lịch
    const STATUS_PROCESS = 1; // đã xếp lịch
    const STATUS_PRIORITIZE = 3; // ưu tiên
    const UNPAID = 0;
    const PAID = 1;
    const PILE = 2;
    const CASH = 0;
    const CARD = 1;

    protected $table = 'orders';
    protected $fillable = [
        'customer_id', 'payment_method', 'is_paid', 'date', 'status', 'total_price', 'pile', 'order_code', 'user_id'
    ];

    public $sortable = ['customer_id', 'date', 'status', 'total_price', 'pile'];

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
