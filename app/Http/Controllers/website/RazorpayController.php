<?php

namespace App\Http\Controllers\website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;
use Razorpay\Api\Api;
use Session;
use Redirect;
use App\Model\orders;
class RazorpayController extends Controller
{
    public function payWithRazorpay($id,$amount)
    {        
    	$data=compact('id','amount');
        return view('payWithRazorpay',$data);
    }

    public function payment($pid=false)
    {
        //Input items of form
        $input = Input::all();
        //get API Configuration 
        $api = new Api(config('custom.razor_key'), config('custom.razor_secret'));
        //Fetch payment information by razorpay_payment_id
        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 

            } catch (\Exception $e) {
                return  $e->getMessage();
                \Session::put('error',$e->getMessage());
                return redirect()->back();
            }
            
            $order=new orders;
            $order->payment_id=$response['id'];
            $order->amount=$response['amount'];
            $order->status=$response['status'];
            $order->email=$response['email'];
            $order->contact=$response['contact'];
            $order->payment_method=$response['method'];
            $order->order_name=$response['description'];
            $order->property_id=$pid;
            $order->fee=$response['fee'];
            $order->tax=$response['tax'];
            $order->bank=$response['bank'];
            $order->card_id=$response['card_id'];
            $order->vpa=$response['vpa'];
           	
            $order->save();


        }
        
        \Session::put('success', 'Payment successful, your order will be despatched in the next 48 hours.');
        return redirect()->back();
    }

}
