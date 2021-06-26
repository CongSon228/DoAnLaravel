<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AdminController extends Controller
{
    
    public function index(){
        if(!Auth::check())
            return redirect('login');
        else
            return view('admin.layouts');
    }
    public function getLogin(){
        return view('Login.login'); 
    }
    public function getlogout(){
    	Auth::logout();
    	return redirect('login');
    }
    public function postlogin(Request $request){
    	$arr = [
            //'name' => $request ->name,
    		'email' => $request ->email,
    		'password'=>$request->password, 
    	];
    	if(Auth::attempt($arr)){
    		return redirect('admin');
    	}else
    	{
    		return redirect('login');
    	}
    }
}
