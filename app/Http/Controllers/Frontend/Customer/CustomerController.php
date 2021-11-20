<?php

namespace App\Http\Controllers\Frontend\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    protected $customers;

    public function __construct(Customers $customers)
    {
        $this->customers = $customers;
    }
    public function profile(Request $request){
        $customers = $this->customers->find($request->id);
        return view('frontend.customers.profile', compact('customers'));
    }
    public function changePass(){
        return view('frontend.customers.changepass');
    }
    public function changePassword(Request $request)
    {       
        
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        Customers::find(auth('customers')->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
         return redirect()->back()->with(['success' => 'Đổi mật khẩu thành công']);
    }
}
