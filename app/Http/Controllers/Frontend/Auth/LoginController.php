<?php

namespace App\Http\Controllers\Frontend\Auth;
use Hash;
use Seesion;
use App\Http\Controllers\Controller;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('frontend.auth.login');
    }  
      

    public function customLogin(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);
        $credentials = $request->only('name', 'password');
        if (Auth::attempt($credentials)) {
            if(Auth::check()){
                return view('frontend.homepage.index');
            }
        }
  
        return redirect("login")->withSuccess('Login details are not valid');
    }
    
    
    public function dashboard()
    {
        if(Auth::check()){
            return view('frontend.homepage.index');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
        
        
    



    // public function registration()
    // {
    //     return view('auth.registration');
    // }
      

    // public function customRegistration(Request $request)
    // {  
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email|unique:users',
    //         'password' => 'required|min:6',
    //     ]);
           
    //     $data = $request->all();
    //     $check = $this->create($data);
         
    //     return redirect("dashboard")->withSuccess('You have signed-in');
    // }


    // public function create(array $data)
    // {
    //   return Customers::create([
    //     'name' => $data['name'],
    //     'email' => $data['email'],
    //     'password' => Hash::make($data['password'])
    //   ]);
    // }    
    

    // public function dashboard()
    // {
    //     if(Auth::check()){
    //         return view('dashboard');
    //     }
  
    //     return redirect("login")->withSuccess('You are not allowed to access');
    // }
    

    // public function signOut() {
    //     Session::flush();
    //     Auth::logout();
  
    //     return Redirect('login');
    // }
}
