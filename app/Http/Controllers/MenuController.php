<?php

namespace App\Http\Controllers;
use Config;
use App\Food;
use App\Order;
use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $food = Food::all();
        return view('menu',compact('food'));
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
        if(session('val')!=0){
        $menu = new Menu;
        $menu->food_name=$request->input('food_name');
        $menu->price=$request->input('price');
        }
        else{
            return redirect('/userlogin');
        }
        


        // $cust->fill($request->except(''));

            $menu->save();
            // $request->session();
            return redirect("{{ route('menu.index') }}");
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
    public function update(Request $request, $id)
    {   
        if(session('val')!=0){
        $f=Food::find($id);
        $menu = new Menu;
        $menu->food_id=$f->id;
        $menu->food_name=$f->food_name;
        $menu->price=$f->price;
        $menu->cust_id=session('val');
        $menu->quantity=$request->input('quantity');
        $f->quantity=$f->quantity-$menu->quantity;
        $menu->save();
        $f->save();
        return redirect("cart");}
        else
        {
         return redirect('/userlogin');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($sum)
    {
        
            $x=Order::all()->where('cust_id',session('val'));
            $id=0;
            foreach($x as $y)
            {
                $id=$y->order_id;
            }
            $del = Menu::all()->where('cust_id',session('val'));
            foreach($del as $d)
            {   
            $order = new Order;
            $order->food_id=$d->food_id;
            $order->food_name=$d->food_name;
            $order->order_id=$id+1;
            $order->price=$d->price;
            $order->cust_id=$d->cust_id;
            $order->quantity=$d->quantity;
            $order->total=$sum;
            $order->status='pending';
            $order->save();
            $d->delete();
        }
        return redirect('/ordersuccess');
    }
}
