<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{

	function __construct()
	{
		$this->middleware('guest');
	}

	public function index()
	{
		return view('auth.register');
	}

	public function store(RegisterRequest $request)
	{
		$user = User::create([
      'name' => $request->get('name'),
      'email' => $request->get('email'),
      'password' => bcrypt($request->get('password'))
    ]);

		if ($user) {
			Auth::loginUsingId($user->id);
			return redirect()->route('login.index');
		}

		return back()->withErrors([
		    'error' => 'Error In the Register',
		]);
	}
}
