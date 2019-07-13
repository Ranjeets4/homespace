<?php

namespace App\Http\Controllers\website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\propertytype;
class aboutController extends Controller
{
    public function about()
	{
		$ptypes=propertytype::get();
		$title = "Homespace About";
		$data = compact('title','ptypes');
		return view('about',$data);
	}
	
}
