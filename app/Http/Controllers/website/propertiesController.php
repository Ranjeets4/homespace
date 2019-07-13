<?php

namespace App\Http\Controllers\website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\property;
use App\Model\state;
use App\Model\propertytype;
use App\Model\location;

class propertiesController extends Controller
{
    public function properties(Request $request, $id=false)
	{
		
		$query=property::Query();

		$searchArr =array();

		if($request['state']!='')
		{
			$query->where('state',$request['state']);
			$searchArr['state'] = $request['state'];
		}
		if($request['location']!='')
		{
			$query->where('address',$request['location']);
			$searchArr['address'] = $request['location'];
		}
		if($request['bedroom']!='')
		{
			$query->where('bedroom',$request['bedroom']);
			$searchArr['bedroom'] = $request['bedroom'];
		}	
		if($request['bathroom']!='')
		{
			$query->where('bathroom',$request['bathroom']);
			$searchArr['bathroom'] = $request['bathroom'];
		}
		if($request['propertystatus']!='')
		{
			
			$query->where('propertystatus',$request['propertystatus']);
			$searchArr['propertystatus'] = $request['propertystatus'];
		}
		if($request['price']!='')
		{
			$arr=explode('-',$request['price']);
			$query->whereBetween('price',[$arr[0],$arr[1]]);
			// $query->where('propertystatus',$request['propertystatus']);
			$searchArr['minprice'] = $arr[0];
			$searchArr['maxprice'] = $arr[1];
				
		}
		

		$properties1=$query->paginate(6);
		$ptypes=propertytype::get();

		// whereBetween('price',[$min,$max]);

		$properties=property::get();
		$location=location::get();
		$state=state::get();
		$max=property::where('status',1)->get()->max('price');
		$min=property::where('status',1)->get()->min('price');
		

		$title = "Homespace Properties";
		$data = compact('title','properties','state','ptypes','location','properties1','searchArr','min','max');
		return view('properties',$data);
	}

	public function propertytypes($id)
	{
		$ptypes=propertytype::get();
		$ptypedetails=property::where('property_type',$id)->get();
		$data=compact('ptypedetails','ptypes');
		return view('propertytypes',$data);
	}
	
}
