<?php

namespace App\Http\Controllers\Backend\DashBorad;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Order;
use App\Models\Services;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $customers;
    protected $orders;
    protected $services;
    protected $users;
    public function __construct(Order $orders, Customers $customers, Services $services, User $users)
    {
        $this->customers = $customers;
        $this->orders = $orders;
        $this->services = $services;
        $this->users = $users;
    }

    public function index() {
        $customers = $this->customers->all();
        $orders = $this->orders->all();
        $services = $this->services->all();
        $users = $this->users->with('userOrders')->where([
            'status' => User::STATUS_INACTIVE,
            'status' => User::STATUS_ACTIVE,
        ])->orderBy('number_book', "DESC")->get();
        $total = 0;
        $number = 0;
        foreach ($users as $user) {
            foreach ($user->userOrders as $key => $value) {
                if($value->is_paid == Order::PAID) {
                    $total += $value->total_price;
                    $number ++;
                }
            }
        }

        return view('backend/admin/dashboard/index', compact('orders', 'customers', 'services', 'users', 'total', 'number'));
    }
}
