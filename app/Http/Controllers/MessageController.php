<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function store(Request $request)
    {
      echo 'a';
      die();

      $this->validate($request,[
        'name' =>'required',
        'email' =>'required|email',
        'contact' =>'required',
        'message' =>'required',
      ],
      [
        'name.required' =>'Please provide us your name',
        'email.required' =>'Email is required',
        'email.email' =>'Please provide valid email',
        'message.required' =>'Message cannot be empty',
        'contact.required' =>'Contact cannot be empty',
      ]);

        $data['name'] = $request->input('name');
        $data['email'] = $request->input('email');
        $data['contact'] = $request->input('contact');
        $data['message'] = $request->input('message');
        if(Message::create($data)){
          return 'true';
        }
        else{
          return 'false';
        }
    }


}
