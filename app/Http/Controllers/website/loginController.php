<?php

namespace App\Http\Controllers\website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\propertytype;
use App\Model\users;
class loginController extends Controller
{
	public function login()
	{
		$ptypes=propertytype::get();
		$title="Login";
		$data=compact('title','ptypes');
	    return view('login',$data);
    }

    public function login_check(Request $request)
    {
    	$users=users::where('email','LIKE',$request['email'])->where('password',md5($request['password']))->first();
			if (!empty($users)){
				
				session(['homespace_id'=>$users->first_name]);
				session(['homespace_email'=>$users->email]);
				
				
				return redirect('/');
			}else{
				return redirect()->back();
			}
    }

}
