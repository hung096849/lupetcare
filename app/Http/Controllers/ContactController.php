<?php

namespace App\Http\Controllers;
use App\Mail\Email;
use App\Http\Requests\Frontend\Contact\ContactFormRequest;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contactForm()
    {
        return view('frontend.contacts.contactForm');
    }
    public function sendContact(ContactFormRequest $request){
         
      

        $input = $request->all();

        Contact::create($input);
        $details = [
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'title'=>$request->title,
            'message'=>$request->message
        ];
        Mail::to($request->email)->send(new Email($details));
        return redirect()->back()->with(['success' => 'Cảm ơn bạn đã đóng góp ý kiến']);
   }
   
}