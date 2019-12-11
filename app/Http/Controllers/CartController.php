<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Food;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session('val')!=0){
            $cart = Menu::all()->where('cust_id',session('val'));
            return view('cart',compact('cart'));}
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $cart)
    {
        $cart->delete()->where('cust_id',session('val'));
        $request->session()->flash('message','Food Deleted Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $cart,Request $request)
    {
        $f=Food::find($cart->food_id);
        // dd($cart);
        dd(session('item'));
        $f->quantity=$f->quantity+$cart->quantity;
        $f->save();
        $cart->delete();
        $request->session()->flash('message','Food Deleted Successfully');
        return redirect()->back();
    }
}
