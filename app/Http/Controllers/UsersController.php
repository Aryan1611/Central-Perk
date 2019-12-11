<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct(){
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $cust = Customer::all();
        return view('user',compact('cust'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            // $request->validate([
            //     'food_name'=>'required|max:255',
            //     'price'=>'required',
            //     'quantity'=>'required',
            // ]);
        // echo $request->input('phone');
        $cust = new Customer;
        $cust->name=$request->input('name');
        $cust->email=$request->input('email');
        $cust->password=$request->input('password');
        $cust->phone=$request->input('phone');
        $cust->address=$request->input('address');


        // $cust->fill($request->except(''));
            $cust->save();
            // $request->session();
            return redirect('userlogin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $users
     * @return \Illuminate\Http\Response
     */
    public function show($users)
    {
        //dd($users);
        $prof=Customer::find($users);
        return view('profile',compact('prof'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $users)
    {
        $users = Customers::find($request->id);
        dd($users);
        $request->validate([
            'name'=>'required|max:255',
            'email'=>'required',
            'phone'=>'required',
            'address' => 'required',
            ]);
        
        $users->fill($request->except('actionType'));
        $users->save();
        $request->session()->flash('message','Details Updated Successfully');
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        $users = Customer::find($request->id);
        $users->name=$request->input('name');
        $users->email=$request->input('email');
        $users->password=$request->input('password');
        $users->phone=$request->input('phone');
        $users->address=$request->input('address');
        $users->save();
        $request->session()->flash('message','Details Updated Successfully');
        return redirect()->route('profile');
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $users)
    {
        //
    }
}
