<?php

namespace App\Http\Controllers;
use App\Customer;
use Illuminate\Http\Request;

class ViewsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function view_index()
    {
        return view('index');
    }

    public function view_about()
    {
        return view('about');
    }

    public function view_contact()
    {
        return view('contact');
    }

    public function view_menu()
    {
        return view('menu');
    }

    public function view_home()
    {
        return view('home');
    }

    public function view_reg()
    {
        return view('userRegister');
    }

    public function view_cart()
    {
        return view('cart');
    }

    public function view_profile()
    {
        $prof=Customer::find(session('val'));
        return view('profile',compact('prof'));
    }
}
