<?php

namespace App\Http\Controllers\website\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Demo;

class DemoController extends Controller
{
    public function add()
	{
		$title = "Admin Add Form";
		$data = compact('title');
		return view('admin\add-demo',$data);
	}
	
	public function save(Request $request){
		$demo = new Demo;
		
		$demo->demo_city = $request['city'];
		$demo->demo_name = $request['name'];
		$demo->demo_value = $request['radio-stacked'];
		$demo->demo_checks = implode(',',$request['checks']);
		$demo->demo_img = $request['image'];
		
		$demo->save();
		
		return redirect('admin/view-demo');
	}
	
	public function view()
	{
		$title = "Admin View Form";
		$demos = Demo::get();
		
		$data = compact('title','demos');
		return view('admin\view-demo',$data);
	}
	
}
