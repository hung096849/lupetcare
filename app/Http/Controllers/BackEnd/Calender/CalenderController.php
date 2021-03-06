<?php

namespace App\Http\Controllers\BackEnd\Calender;

use App\Constant\PermissionConstant;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Scheduled;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalenderController extends Controller
{
    protected $orders;
    protected $users;
    public function __construct(Order $orders, User $users)
    {
        $this->orders   = $orders;
        $this->users    = $users;
    }

    public function index(Request $request)
    {
        if(Auth::user()->can(PermissionConstant::RECURRINGEVENTS_PERMISSION_LIST)) {
            $orders = $this->orders->where('status', Order::STATUS_IN_PROCESS)->orWhere('status', Order::STATUS_PRIORITIZE)->sortable()->paginate(10);
            $users = $this->users->where('status', User::STATUS_ACTIVE)->get();
            return view('backend/admin/calender/index', compact('orders', 'users'));
        }
    }
}
