<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthenticationRequest;

class LoginController extends Controller
{

	function __construct()
	{
		// if not authenticate redirect to '/login'
		$this->middleware('auth')->only('logout');

		// if is authenticate redirect to '/'
		$this->middleware('guest')->except('logout');
	}

	public function index()
	{
		return view('auth.login');
	}

	public function authenticate(AuthenticationRequest $request)
	{
		$credentials = $request->only('email', 'password');

		if(Auth::attempt($credentials)){
			$request->session()->regenerate();
			return redirect()->intended('/');
		}

		return back()->withErrors([
		    'error_auth' => 'Email or Password Incorrect',
		]);
	}

	public function logout(Request $request)
	{
		Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login.index');
	}
}
