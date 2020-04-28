<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SendEmailController extends Controller
{
    public function index(){

    	return view('send_email');
    }

    public function send(Request $request){
    	$request->validate([
            'name'	   => 'required',
    		'email'    => 'required | email',
    		'message'  => 'required'
           
        ]);

        $data =array(
        	'name'    =>  $request->name,
            'email'    => $request->email,
 			'message' =>  $request->message	
        );


    	Mail::to('2016cshemant4830@poornima.edu.in')->send( new SendMail($data));
    	return redirect()->back()->with('message', 'email Send Successfully');
    }
}