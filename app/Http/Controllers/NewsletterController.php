<?php

namespace App\Http\Controllers;

use App\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
  public function store(Request $request)
  {
      $data['email'] = $request->input('email');

      if(Newsletter::create($data)){
        return 'true';
      }
      else{
        return 'false';
      }
  }
}
