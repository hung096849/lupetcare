<?php

namespace App\Http\Controllers;
use App\Mail\Email;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contactForm()
    {
        return view('frontend.contacts.contactForm');
    }

    // public function storeContactForm(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'phone' => 'required|digits:11|numeric',
    //         'message' => 'required',
    //     ]);

    //     $input = $request->all();

    //     Contact::create($input);

    //     //  Send mail to admin
    
    // }
    public function sendContact(Request $request){
         
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:11|numeric',
            'message' => 'required',
        ]);

        $input = $request->all();

        Contact::create($input);
        $details = [
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'message'=>$request->message
        ];
        Mail::to('hung3715482@gmail.com')->send(new Email($details));
        return redirect()->back()->with(['success' => 'Contact Form Submit Successfully']);
   }
   
}