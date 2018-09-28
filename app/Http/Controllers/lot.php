<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

class lot extends Controller
{
    public function index()
    {
       // return view('profile');
		return view('lotview');
    }
	public function load()
    {
        return view('lotview');
    }
	public function savelot(Request $request)
	{
		print_r($request);
	}
}
