<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

	function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		// \App\Models\User::with('notes')->get();
		return view('home',[
      'notes' => Auth::user()->notes()->get()
    ]);
	}
}
