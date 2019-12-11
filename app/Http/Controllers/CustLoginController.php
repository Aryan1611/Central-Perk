<?php

namespace App\Http\Controllers;

use App\Customer;
use Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class CustLoginController extends Controller
{
    

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';
    protected $guard = 'customer';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function showLoginform()
    {
        return view('userlogin');
    }

    public function login(Request $request)
    {
        $cust = new Customer;
        $cust = Customer::where("email",$request->email)->where('password',$request->password)->first();

        $var = Customer::where("email",$request->email)->where('password',$request->password)->first();
        if($var){
            Controller::ul($cust->id);
            $request->session();
            return redirect('/index');
        }
        else{
            return redirect('userlogin')->with('error','INVALID CREDENTIALS');
        }
    
    }

    public function logout(Request $request)
    {
        Controller::ul(0);
        return redirect('/');
    }
}
