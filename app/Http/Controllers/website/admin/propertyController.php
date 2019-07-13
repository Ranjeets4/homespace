<?php

namespace App\Http\Controllers\website\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\state;
use App\model\property;
use App\Model\location;
use App\Model\propertytype;


class propertyController extends Controller
{
    public function add($id=false)
	{
		if($id!='')
		{
			$property=property::where(['id'=>$id])->first();
		}
		else
		{
			$property="";
		}
		$ptypes=propertytype::get();
		$title = "Admin Add Property";
		$states=state::get();
		$locations = location::where('location_status',1)->get();
		$data = compact('title','states','property','locations','ptypes');
		return view('admin\add-Property',$data);
	}

	public function save(Request $request, $id=false)
	{
		if ($id!=''){
			$property = property::find($id);	
		}else{
			$property = new property;
		}
			
			$property->price=$request['price'];
			$property->build_Area=$request['build_area'];
			$property->lot_area=$request['lot_area'];
			$property->description=$request['description'];
			$property->address=$request['address'];
			$property->bedroom=$request['bedrooms'];
			$property->bathroom=$request['bathrooms'];
			$property->floor=$request['floors'];
			$property->kitchen=$request['kitchens'];
			$property->garage=$request['garages'];
			$property->property_type=$request['ptypes'];
			$property->state=$request['state'];
			$property->city=$request['city'];
			
			$property->propertystatus=$request['propertystatus'];
			$property->propertytypestatus=implode(',',$request['pts']);
			// $property->status=$request['status'];
			$file = $request->file('image');
			if ($file!=''){
				
				$destination = "uploads/property/";
				$imageName = $destination.rand().time().'.'.$file->getClientOriginalExtension();
				$file->move($destination,$imageName);
				$property->image=$imageName;
			}
			
			$property->save();
			return redirect('admin/view-property');
			
	}

	public function status($id,$value)
	{
		$property=property::find($id);
		$property->status=$value;
		$property->save();
		return redirect()->back();
	}


	public function view()
	{
		$query=property::Query();
		if ($request['search']!=''){
			$query->where('price',$request['search']);
		}


		$arr = array('search'=>$request['search']);
		
		$title = "Admin View Property";
		$property=$query->paginate(2)->appends($arr);

		// p($property);
		$data = compact('title','property');
		return view('admin\view-Property',$data);
	}

	public function delete($id)
	{
		
		$property = property::find($id);
		$property->delete();
		return redirect('/admin/view-property');
	}
	
}
