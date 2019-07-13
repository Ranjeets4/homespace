<?php

namespace App\Http\Controllers\website\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class registerController extends Controller
{
    public function register()
	{
		$title = "Admin Register";
		$data = compact('title');
		return view('admin/register',$data);
	}
	
}
