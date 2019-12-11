<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    public function index()
    {
        $id=session('o_id');
        $details = Order::all()->where('cust_id',session('val'))->where('order_id',$id);
        return view('orderdetails',compact('details')); 
    }

    public function allorders()
    {
        $all=Order::all();
        return view('allorders',compact('all'));
    }

    public function confirm($id)
    {
        $con=Order::find($id);
        $con->status='Confirm';
        $con->save();
        return redirect('allorders');
    }
}
