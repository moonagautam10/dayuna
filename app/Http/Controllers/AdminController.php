<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;


class AdminController extends Controller
{
    public function loginForm(){
    	return view('admin.login');
    }

    public function login(Request $request){
    	$credentials = $request->only('email', 'password');
    	if(Auth::guard('admin')->attempt($credentials, $request->rember)){
    		$user = Admin::where('email', $request->email)->limit(1)->first();
    		Auth::guard('admin')->login($user);
    		return redirect()->route('admin.home');
    	}
    	return redirect()->route('admin.login')->with('status', 'Login Failed');

    }
    public function getAdminDashboard(){
        return view('admin.home');
    }
    public function logout(){
    	if(Auth::guard('admin')->logout()){
    		return redirect()->route('admin.login')->wuth('status', 'Logout success');
    	}
    }
}
