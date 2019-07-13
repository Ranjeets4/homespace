<?php

namespace App\Http\Controllers\website\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin;

class loginController extends Controller
{
    public function login()
	{
		$title = "Admin login";
		$data = compact('title');
		return view('admin/login',$data);
	}
	

	public function login_check(Request $request)
	{
			$admin=admin::where('email','LIKE',$request['email'])->where('password',md5($request['password']))->first();
			if (!empty($admin)){
				
				session(['homespace_admin_id'=>$admin->name]);
				
				return redirect('admin/dashboard');
			}else{
				return redirect()->back();
			}
	}
}
