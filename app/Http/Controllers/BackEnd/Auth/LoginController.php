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
                    'email.required' => "Nhập Email",
                    'email.email' => "Không đúng định dạng email",
                    'password.required' => "Nhập mật khẩu"
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
                'password.required' => "Vui lòng không để trống",
                'newpassword.required' => "Vui lòng không để trống",
                'newpassword.different' => "Vui lòng nhập khác mật khẩu cũ",
                'newpassword.min' => "Nhập ít nhất 8 ký tự",
                'comfirm-password.required' => "Vui lòng không để trống",
                'comfirm-password.same' => "Không trùng với mật khẩu mới"
            ]
        );

        $user = Auth::user();
        $model = User::find($user->id);
        if(Hash::check($request->password, $user->password)){
            $model->password = bcrypt($request->newpassword);
            $model->save();
            return redirect(route('backend.admin.dashboard.show'));
        }else{
            return redirect()->back()->with('msg', 'Mật khẩu cũ không đúng');
        }
    }

}
