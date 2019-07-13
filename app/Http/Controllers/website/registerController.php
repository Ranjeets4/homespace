<?php

namespace App\Http\Controllers\website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\propertytype;
use App\Model\users;
class registerController extends Controller
{
	public function register()
	{
		$ptypes=propertytype::get();
	
    $title="Register";
	$data=compact('title','ptypes');
    return view('register',$data);
	}

	public function save(Request $request)
	{
		
		$users=new users;
		$users->first_name=$request['fname'];
		$users->last_name=$request['lname'];
		$users->email=$request['email'];
		$users->password=md5($request['password']);
		$users->save();
		return redirect('/register');
		

	}
}
