<?php

namespace App\Http\Controllers\website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\propertytype;

class contactController extends Controller
{
    public function contact()
	{
		$ptypes=propertytype::get();
		$title = "Homespace Contact";
		$data = compact('title','ptypes');
		return view('contact',$data);
	}
	
}
