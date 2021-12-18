<?php

namespace App\Http\Controllers\Frontend\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\DB;
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
        ],
        [
            'current_password.required'=>'Xin vui lòng nhập mật khẩu hiện tại',
            'new_password.required'=>'Xin vui lòng nhập mật khẩu mới',
            'new_confirm_password.required'=>'Xin vui lòng xác nhận mật khẩu mới',
        ]);
   
        Customers::find(auth('customers')->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
         return redirect()->back()->with(['success' => 'Đổi mật khẩu thành công']);
    }
    public function showChangeProfile(Request $request){
        $customers = $this->customers->find($request->id);
        return view('frontend.customers.changeProfile',compact('customers'));
    }
    public function changeProfile(Request $request){
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
        ],
        [
            'name.required' => ' Xin vui lòng nhập họ và tên mới',
            'phone.required' => ' Xin vui lòng nhập số điện thoại mới',
        ]);
        $userUpdate = [
            'name'          =>  $request->name,
            'slug' => SlugService::createSlug(Customers::class, 'slug', $request->name),
            'phone'         =>  $request->phone,
        ];
        Customers::find(auth('customers')->user()->id)->update($userUpdate);
        return redirect()->back()->with(['success' => 'Đổi thông tin thành công']);
    }
}
