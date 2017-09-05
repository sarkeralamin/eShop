<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Mail;
//use Illuminate\Validation\Validator;

use Illuminate\Support\Facades\Validator;



class ContactController extends Controller
{

    public function getContact(){
        return view('contact');
    }
    public function postContactUsForm(Request $request){

       // $data = Request::all();

        $data = $request->all();

       // dd($data);

        $rules = array (
            'fname' => 'required',
            'email' => 'required|email',
            'message' => 'required|min:5'
        );

        $validator = Validator::make($data, $rules);

        if($validator -> passes()){
            Mail::send('contact', $data, function($message) use ($data){
                $message->from($data['email'], $data['fname']);

                $message->to('mygmail@gmail.com', 'Luke Spoor')->cc('mygmail2@icloud.com')->subject('Feedback from Contact Form');
            });

            return redirect('posts');
        } else {
            return redirect('/');
        }
    }
}
