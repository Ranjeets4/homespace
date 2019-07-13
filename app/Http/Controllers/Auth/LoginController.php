<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\Model\users;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

     public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();
        // echo "<pre>";
        // print_r($user);
        // die;

        $users=users::where('email',$user['email'])->first();
        if(!empty($users))
        {
            session(['homespace_id'=>$users->first_name]);

        }
        else
        {
            $userdata=new users;
            $userdata->first_name=$user['given_name'];
            $userdata->last_name=$user['family_name'];
            $userdata->email=$user['email'];
            $userdata->password="abc";
            $userdata->save();
            session(['homespace_id'=>$user['given_name']]);
               
        }
        $data=compact('user','users','userdata');
        
        return redirect('/');

        // $user->token;
    }
}
