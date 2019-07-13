<?php

namespace App\Http\Controllers\website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\propertytype;
use App\Model\property;
class propertydetailsController extends Controller
{
    public function property_details($id)
	{
		$ptypes=propertytype::get();
		$propertydetails=property::where('id',$id)->first();
		$title = "Homespace property-details";
		$data = compact('title','propertydetails','ptypes');
		return view('property-details',$data);
	}
	
}
