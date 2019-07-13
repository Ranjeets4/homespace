<?php

namespace App\Http\Controllers\website\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class indexController extends Controller
{

    public function index()
	{
		$title = "Admin";
		$data = compact('title');
		return view('admin\index',$data);
	}
	
	public function logout()
	{
		session()->forget('homespace_admin_id');
		return redirect('admin');
	}
}
