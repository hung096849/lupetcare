<?php

namespace App\Http\Controllers\BackEnd\Auth;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function index()
    {
        return view('backend/admin/auth/login');
    }

    public function login(Request $request)
    {
        $request->validate(
                [
                    'email' => "required|email",
                    'password' => "required"
                ],
                [
                    'email.required' => " Hay nhap email",
                    'email.email' => "Khong dung dinh dang email",
                    'password.required' => "Hay nhap password"
                ]
            );

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect(route('backend.admin.dashboard.show'));

        } else {
            return redirect()->back()->with('msg', 'tai khoan/mat khau khong chinh sac!');

        }
    }


    public function Logout()
    {
        Auth::logout();
        return redirect(route('backend.admin.dashboard.show'));
    }

    public function changepassword()
    {
        $user = Auth::user();
        return view('backend.admin.auth.changePassword',compact('user'));
    }

    public function postchangePassword(Request $request)
    {
        $request->validate(
            [
                'password' => "required",
                'newpassword' => "required",
                'newpassword' => "different:password",
                'newpassword' => "min:8",
                'comfirm-password' => "required",
                'comfirm-password' => "same:newpassword",
            ],
            [
                'password.required' => "Vui long khong de trong",
                'newpassword.required' => "Vui long khong de trong",
                'newpassword.different' => "Vui long nhap khac mat khau cu",
                'newpassword.min' => "Nhap it nhat 8 ky tu",
                'comfirm-password.required' => "Vui long khong de trong",
                'comfirm-password.same' => "Khong trung voi mat khau moi"
            ]
        );

        $user = Auth::user();
        $model = User::find($user->id);
        if(Hash::check($request->password, $user->password)){
            $model->password = bcrypt($request->newpassword);
            $model->save();
            return redirect(route('backend.admin.dashboard.show'));
        }else{
            return redirect()->back()->with('msg', 'mật khẩu cũ không đúng');
        }
    }

}
