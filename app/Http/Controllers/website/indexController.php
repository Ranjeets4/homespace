<?php

namespace App\Http\Controllers\website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\state;
use App\Model\property;
use App\Model\location;
use App\Model\propertytype;
use App\Mail\homespaceMail;
use Mail;

class indexController extends Controller
{
    public function index()
	{
		$ptypes=propertytype::get();
		$state=state::get();
		$properties=property::where('status',1)->paginate(6);
		$location=location::get();

		$sliderPros = property::where('status',1)->whereRaw("FIND_IN_SET('slider',propertytypestatus)")->get();
		$max=property::where('status',1)->get()->max('price');
		$min=property::where('status',1)->get()->min('price');
		$title = "Homespace";
		$data = compact('title','state', 'properties','location','ptypes','sliderPros','min','max');
		return view('index',$data);
	}
	public function logout()
	{
		session()->forget('homespace_id');
		return redirect('/');
	}

	public function mail()
	{
		$data = (object) array(
			'name' => 'Test',
			'phone' => 12165,
			'msg'=>'hello ',
			'subject'=>'login password',
			'to'=>'kunwarpankajdna27@gmail.com'
		);

		$view = 'mails.test';

		Mail::to($data->to)->send( new homespaceMail($data,$view));

		// Mail::send(['html'=>'mails.test'],$data,function($message){
		// 	$message->to('kunwarpankajdna27@gmail.com')->subject('test');
		// });

		echo "mail send";
		die;
	}
	
}
