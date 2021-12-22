<?php
namespace App\Http\Controllers\Frontend\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Jobs\SendSignupEmail;
use Illuminate\Http\Request;
use App\Http\Requests\Frontend\Auth\CustomerRequest;
use Carbon\Carbon;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
class LoginController extends Controller
{
   
    public function index()
    { 
        return view('frontend.auth.login');
    }  
      

    public function customLogin(Request $request)
    {
        $credentials = $request->validate(
           [
            'email' => 'required|email',
            'password' => 'required',
           ], 
           [
            'password.required' => ' Cần nhập mật khẩu',
            'email.required' => ' Cần nhập email',
            'email.email' => 'Phải đúng định dạng email',
           ]
        );
        $credentials = $request->only('email', 'password');
       
        if (Auth::guard('customers')->attempt($credentials)) {
            $credentials['is_verified'] = Customers::CONFIRM;
            return redirect()->route('frontend.homepage.show');
        } else {
            return redirect()->back()->with(['fail' => 'Sai tài khoản hoặc mật khẩu']);
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
        $customer->status= Customers::CUSTOMER;
        $customer->email_verified_at = Carbon::now();
        $customer->email = $request->email; 
        $customer->password = Hash::make($request->password);
        $customer->re_password = Hash::make($request->re_password);
        $customer->verification_code = sha1(time());
        $customer->save();
        $emailJob = new SendSignupEmail($customer);
        dispatch($emailJob);
        return redirect()->back()->with(['success' => 'Bạn hãy kiểm tra mail của bạn để xác nhận']);

    }
    public function verifyUser(Request $request){
        $verification_code = \Illuminate\Support\Facades\Request::get('code');
        $user = Customers::where(['verification_code' => $verification_code])->first();
        if($user != null){
            $user->is_verified = Customers::CONFIRM;
             $user->status= Customers::MEMBER;
            $user->save();
            return redirect()->route('frontend.login.show')->with(session()->flash('alert-success', 'Your account is verified. Please login!'));
        }
        else {
            $user->is_verified = Customers::UNCONFIRM;
            $user->status= Customers::CUSTOMER;
        }
        return redirect()->route('frontend.login.show')->with(session()->flash('alert-danger', 'Invalid verification code!'));
       
    }
    public function signOut(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
       
  
        return redirect()->intended('/');
    }
    public function showForgetPasswordForm()
    {
       return view('frontend.auth.forget');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:customers',
        ],
        [
            'email.required'=> 'Vui lòng nhập email để lấy lại mật khẩu'
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
          ]);

        Mail::send('frontend.auth.forgetLink', ['token' => $token], function($message) use($request){
            $message->from('us@example.com', 'Lupetcare');
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'Bạn hãy kiểm tra email của bạn để lấy lại mật khẩu!');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showResetPasswordForm($token) { 
       return view('frontend.auth.reset', ['token' => $token]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:customers',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ],
        [
            'email.exists'=>'Email trên không khớp với tài khoản',
            'password.min'=>'Mật khẩu phải từ 6 kí tự trở lên ',
        ]
    );

        $updatePassword = DB::table('password_resets')
                            ->where([
                              'email' => $request->email, 
                              'token' => $request->token
                            ])
                            ->first();

        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = Customers::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return  redirect()->back()->with(['success' => 'Đổi mật khẩu thành công, vui lòng quay lại trang đăng nhập ']);
    }
}