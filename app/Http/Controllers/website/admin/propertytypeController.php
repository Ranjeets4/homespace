<?php

namespace App\Http\Controllers\website\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\propertytype;
use App\Model\location;
use Validator;
use DB;
class propertytypeController extends Controller
{
    public function add($id=false)
	{
		if($id!='')
		{
			$ptype=propertytype::where(['id'=>$id])->first();
		}
		else
		{
			$ptype="";
		}
		$location=new location;
		$title = "Admin Add Property Type";
		$data = compact('title','location','ptype');
		return view('admin\add-property-type',$data);
	}
	
	public function save(Request $request, $id=false)
	{

		if ($id!=''){
			$ptype = propertytype::find($id);	
		}else{
			$ptype = new propertytype;
		}

		$validator = Validator::make($request->all(),[
	        'title' 			=> 'required|unique:homespace_property_types,Title,id'.$id,
	        'short_description' => 'required',
		]);
		if ($validator->fails())
		{
			return redirect()->back()->withErrors($validator)->withInput();
		
		}else{

			DB::beginTransaction();
			try{
				$ptype->Title=$request['title'];
				$ptype->short_description=$request['short_description'];
				$ptype->slug=str_slug($request['title']);
				
				$ptype->save();
			}
			catch(\Exception $e)
			{
				$error = $e->getMessages();
				DB::RollBack();
				return redirect()->back()->withErrors($error);
			}
			DB::commit();
		}
		return redirect('/admin/view-property-type');

	}
	public function status($id,$value)
	{
		$ptype=propertytype::find($id);
		$ptype->status=$value;
		$ptype->save();
		return redirect()->back();
	}

	public function view()
	{
		$query=propertytype::Query();
		if ($request['search']!=''){
			$query->where('Title','LIKE','%'.$request['search'].'%');
		}


		$arr = array('search'=>$request['search']);
		
		$location=new location;
		$title = "Admin View Property Type";
		$ptypes=$query->paginate(2)->appends($arr);
		$data = compact('title','ptypes','location');
		return view('admin\view-property-type',$data);
	}
	public function delete($id)
	{
		
		$ptype = propertytype::find($id);
		$ptype->delete();
		return redirect('/admin/view-property-type');
	}
	
}
	