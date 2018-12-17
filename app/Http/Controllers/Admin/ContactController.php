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
        $c = Contact::all()[0];
        return new Resource($c);
    }

    public function store(Request $request)
    {
      $data['name'] = $request->input('name');
      $data['phone'] = $request->input('phone');
      $data['email'] = $request->input('email');
      $data['address'] = $request->input('address');
      $data['facebook'] = $request->input('facebook');
      $data['twitter'] = $request->input('twitter');
      $data['in'] = $request->input('in');
      $data['pin'] = $request->input('pin');
      $data['ABN'] = $request->input('ABN');
      $data['RTO'] = $request->input('RTO');
      $data['CRICOS'] = $request->input('CRICOS');
      Contact::create($data);
      $c = Contact::all()[0];
              return new Resource($c);
    }

    public function show(Contact $contact)
    {

          $c = Contact::all()[0];
                  return new Resource($c);
    }


    public function update(Request $request)
    {
      $c = Contact::all()[0];
      $data['name'] = $request->input('name');
      $data['phone'] = $request->input('phone');
      $data['email'] = $request->input('email');
      $data['address'] = $request->input('address');
      $data['facebook'] = $request->input('facebook');
      $data['twitter'] = $request->input('twitter');
      $data['in'] = $request->input('in');
      $data['pin'] = $request->input('pin');
      $data['ABN'] = $request->input('ABN');
      $data['RTO'] = $request->input('RTO');
      $data['CRICOS'] = $request->input('CRICOS');
      $c->update($data);
      $c = Contact::all()[0];
              return new Resource($c);
    }

}
