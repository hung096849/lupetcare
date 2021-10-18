<?php

namespace App\Http\Controllers;
use App\Mail\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class MailController extends Controller
{
    //
    public function sendMail(){
       $details = [
           'title'=>'Mail from hung',
           'body' =>'Test mail'
       ];
       Mail::to("hung3715482@gmail.com")->send(new Email($details));
       return "Email Sent";
    }
}
