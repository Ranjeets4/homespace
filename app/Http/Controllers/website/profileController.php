<?php

namespace App\Http\Controllers\website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\users;


class profileController extends Controller
{
	public function profile()
	{
		 return view('/profile/profile');
	}
    public function edit()
	{

		$userdetail=users::where('email',session('homespace_email'))->first();
		$data=compact('userdetail');

		return view('/profile/edit',$data);
	}
  	public function password()
	{
		 return view('/profile/password');
	}
	public function saveprofile()
	{
		
	}
}
