<?php

namespace App\Http\Controllers\BackEnd\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

}
