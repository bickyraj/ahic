<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
	    $this->middleware(['auth:api', 'admin']);
	}

	public function index()
	{
		return view('admin.dashboard');
	}

	public function changePassword(Request $request)
	{
	    $oldpassword = $request->oldpassword;
	    $password = $request->password;
	    $status = 0;
	    if (Hash::check($oldpassword, Auth::user()->password)) {

	        $user = Auth::user();
	        $user->password = Hash::make($password);
	        if ($user->save()) {
	            $status = 1;
	        }
	        
	    } else {
	        $status = 0;
	    }
	    return response()->json([
	        'status' => $status
	    ]);
	}
}
