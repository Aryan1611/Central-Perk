<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Order;
use App\Food;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if(session('val')!=0){
        $order = Order::all()->where('cust_id',session('val'));
        return view('order',compact('order'));}
        else{
            return redirect('/userlogin');
        }
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
        dd($request);
        foreach($cart as $c)
        {$order = new Order;
        $order->food_id=$c->food_id;
        $order->food_name=$c->food_name;
        $order->price=$c->price;
        $order->cust_id=$c->cust_id;
        $order->quantity=$c->quantity;
        $order->save();}
        return redirect("cart");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        session(['o_id' => $id]);
        return redirect()->action('DetailsController@index');
        // $details = Order::all()->where('cust_id',session('val'))->where('order_id',$id);
        // return view('orderdetails',compact('details')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($order)
    {   
        
        $order = new Order;
        $order->food_id=$c->food_id;
        $order->food_name=$c->food_name;
        $order->price=$c->price;
        $order->cust_id=$c->cust_id;
        $order->quantity=$c->quantity;
        $order->save();
        return redirect("cart");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $order
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $order = Menu::all()->where('cust_id',session('val'));
        $f=Food::find($order->food_id);
        $f->quantity=$f->quantity+$order->quantity;
        $f->save();
        $order->delete();
        $request->session()->flash('message','Food Deleted Successfully');
        return redirect()->back();  
    }
}
