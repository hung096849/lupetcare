<?php

namespace App\Http\Controllers\Frontend\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MailController;
class LoginController extends Controller
{
    //

    // public function __construct()
    // {
    //     $this->middleware(['auth']);
    // }
    public function index()
    { 
        // dd(1);
        return view('frontend.auth.login');
    }  
      

    public function customLogin(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);
       if($request->validated()){
        $credentials = $request->only('name', 'password');
        $credentials['verified']=Customers::VERIFIED;
        if(Auth::guard('customer')->attempt($credentials)){
            return redirect()->intended();
        }
        else{

        }
       }
    }
    public function register_form(){
        return view('frontend.auth.register');
    }
    public function register(Request $request)
    {
        $user = new Customers();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

       
        if($user != null){
            MailController::sendSignupEmail($user->name, $user->email, $user->verification_code);
            return redirect()->back()->with(session()->flash('alert-success', 'Your account has been created. Please check email for verification link.'));
        }

        return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong!'));
    }
    public function verifyUser(Request $request){
        $verification_code = \Illuminate\Support\Facades\Request::get('code');
        $user = Customers::where(['verification_code' => $verification_code])->first();
        if($user != null){
            $user->is_verified = 1;
            $user->save();
            return redirect()->route('')->with(session()->flash('alert-success', 'Your account is verified. Please login!'));
        }

       
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
    

    public function signOut(Request $request) {
      if(Auth::guard('customer')->user()){
        Auth::guard('customer')->logout();
      }
       
  
        return redirect()->intended('/');
    }
}
