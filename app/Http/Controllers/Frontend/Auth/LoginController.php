<?php

namespace App\Http\Controllers\Frontend\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Jobs\sendSignupEmail;
use Illuminate\Http\Request;
use App\Http\Requests\Frontend\Auth\CustomerRequest;
use App\Http\Controllers\MailController;
use Carbon\Carbon;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   
    public function index()
    { 
        return view('frontend.auth.login');
    }  
      

    public function customLogin(Request $request)
    {
      
        $credentials = $request->only('name', 'password');
       
        // dd($credentials);
       
        if (Auth::guard('customers')->attempt($credentials)) {
            $credentials['is_verified'] = Customers::CONFIRM;
            return redirect()->route('frontend.homepage.show');
        } else {
            return redirect()->back()->withInput();
        }

       
    }
    public function register_form(){
        return view('frontend.auth.register');
    }
    public function register(CustomerRequest $request)
    {
       
        $customer = new Customers();
        $customer->name = $request->name;
        $customer->slug = SlugService::createSlug(Customers::class, 'slug', $request->name);
        $customer->phone= $request->phone;
        $customer->status= Customers::MEMBER;
        $customer->email_verified_at = Carbon::now();
        $customer->email = $request->email;
        $customer->password = Hash::make($request->password);
        $customer->verification_code = sha1(time());
        $customer->save();
        $emailJob = new SendSignupEmail($customer);
        dispatch($emailJob);
        return redirect()->back()->with(['success' => 'Bạn hãy kiểm tra mail của bạn để xác nhận']);

        // $user = new Customers();
        // $user->name = $request->name;
        // $user->slug = SlugService::createSlug(Customers::class, 'slug', $request->name);
        // $user->phone= $request->phone;
        // $user->status= Customers::MEMBER;
        // $user->email_verified_at = Carbon::now();
        // $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        // $user->verification_code = sha1(time());
        // $user->save();
        
        // if($input != null){
        //     MailController::sendSignupEmail($input->name, $input->email, $input->verification_code);
        //     return back();
        //     // ->route('alert-success', 'Your account has been created. Please check email for verification link.');
        // }

        // return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong!'));
    }
    public function verifyUser(Request $request){
        $verification_code = \Illuminate\Support\Facades\Request::get('code');
        $user = Customers::where(['verification_code' => $verification_code])->first();
        if($user != null){
            $user->is_verified = Customers::CONFIRM;
            $user->save();
            return redirect()->route('frontend.login.show')->with(session()->flash('alert-success', 'Your account is verified. Please login!'));
        }
        return redirect()->route('frontend.login.show')->with(session()->flash('alert-danger', 'Invalid verification code!'));
       
    }
   
    

    // public function signOut(Request $request) {
    //   if(Auth::guard('customer')->user()){
    //     Auth::guard('customer')->logout();
    //   }
       
  
    //     return redirect()->intended('/');
    // }
}
