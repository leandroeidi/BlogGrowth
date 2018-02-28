<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
	public function login()
	{
		return view('admin_login');
	}
	
    public function register(Request $request)
	{
		if ($request->isMethod('post'))
		{
			User::create([
						'name' => $request->input('name'),
						'email' => $request->input('email'),
						'password' => bcrypt($request->input('password')),
			]);
		} 
		
		return redirect('/admin');
	}
}
