<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Resources\Menu as Resource;

use App\PaymentOption;
use Illuminate\Http\Request;

class PaymentOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a = PaymentOption::all();
        return Resource::collection($a);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['title'] = $request->input('title');
        $data['description'] = $request->input('description');
        PaymentOption::create($data);
          $a = PaymentOption::all();
        return Resource::collection($a);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PaymentOption  $paymentOption
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paymentOption= PaymentOption::findOrFail($id);
     return new Resource($paymentOption);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PaymentOption  $paymentOption
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentOption $paymentOption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaymentOption  $paymentOption
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
   {
       $paymentOption = PaymentOption::findOrFail($request->id);
        $data['title'] = $request->input('title');
        $data['description'] = $request->input('description');
        $paymentOption->update($data);
          $a = PaymentOption::all();
                return Resource::collection($a);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaymentOption  $paymentOption
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paymentOption = PaymentOption::findOrFail($id)->delete();
          $a = PaymentOption::all();
                return Resource::collection($a);
    }
}
