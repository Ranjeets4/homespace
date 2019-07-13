<?php

namespace App\Http\Controllers\website\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\location;
use App\Model\state;
use DB;
class locationController extends Controller
{
    public function add($id=false)
	{
		if ($id!=''){
			$location = location::where(['location_id'=>$id])->first();
		}else{
			$location ="";
		}


		$title = "Admin Add Location";
		$state=state::get();
		$data = compact('title','state','location');
		return view('admin\add-location',$data);
	}
	public function save(Request $request,$id =false){
		
		if ($id!=''){
			$location = location::find($id);	
		}else{
			$location = new location;
		}
		
		DB::beginTransaction();
		try {
			$location->state_id =$request['state'];
			$location->location = $request['location'];
			$location->save();
		} catch (\Exception $e) {
			$errormsg = $e->getMessage();
			DB::rollBack();
			return redirect()->back()->withErrors($errormsg);
		}
		DB::commit();

		
		return redirect('admin/view-location');
	}
	
	public function view(Request $request)
	{
		$query = location::Query();

		if ($request['search']!=''){
			$query->where('location','LIKE','%'.$request['search'].'%');
		}


		$arr = array('search'=>$request['search']);

		$title = "Admin View Location";

		$locations = $query->join('states','homespace_locations.state_id','=','states.id')->paginate(2)->appends($arr);
		// echo "<pre>";
		// print_r($locations);
		// die;
		$data = compact('title','locations');
		return view('admin\view-location',$data);
	}

	public function status($id,$value)
	{
		$location = location::find($id);
		$location->location_status = $value;
		$location->save();
		
		return redirect()->back();
	}
	
	public function getLocations($id)
	{
		$locations = location::where('state_id',$id)->get();

		$options = '<option value=""> select location </option>';
		foreach ($locations as $value) {
			$options = $options.'<option value="'.$value->location_id.'" > '.$value->location.' </option>';
		}

		// echo $options;
		return response()->json(['status'=>1,'data'=>$options]);
	}
}
