<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Resources\Menu as Resource;
use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $c = Contact::all();
        return  Resource::collection($c);
    }

    public function store(Request $request)
    {
      $data['name'] = $request->input('name');
      $data['phone'] = $request->input('phone');
      $data['email'] = $request->input('email');
      $data['address'] = $request->input('address');
      $data['street_name'] = $request->input('street_name');
      $data['call_time'] = $request->input('call_time');
      $data['message'] = $request->input('message');
      $data['fb'] = $request->input('fb');
      $data['tw'] = $request->input('tw');
      $data['in'] = $request->input('in');
      $data['yt'] = $request->input('yt');
      $data['ABN'] = $request->input('ABN');
      $data['RTO'] = $request->input('RTO');
      $data['CRICOS'] = $request->input('CRICOS');
      Contact::create($data);
      $c = Contact::all();
      return  Resource::collection($c);
    }

    public function show(Contact $contact)
    {
          $c = Contact::all();
          return  Resource::collection($c);
    }

    public function update(Request $request)
    {
      $c = Contact::all()[0];
      $data['name'] = $request->input('name');
      $data['phone'] = $request->input('phone');
      $data['email'] = $request->input('email');
      $data['address'] = $request->input('address');
      $data['street_name'] = $request->input('street_name');
      $data['message'] = $request->input('message');
      $data['call_time'] = $request->input('call_time');
      $data['fb'] = $request->input('fb');
      $data['tw'] = $request->input('tw');
      $data['in'] = $request->input('in');
      $data['yt'] = $request->input('yt');
      $data['ABN'] = $request->input('ABN');
      $data['RTO'] = $request->input('RTO');
      $data['CRICOS'] = $request->input('CRICOS');
      $c->update($data);
      $c = Contact::all();
      return  Resource::collection($c);

    }

}
