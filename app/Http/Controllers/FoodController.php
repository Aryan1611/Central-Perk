<?php

namespace App\Http\Controllers;

use App\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $food = Food::all();
        return view('addfood',compact('food'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return ("Create AddFood Page");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request['actionType'] == 'Create'){
            $request->validate([
                'food_name'=>'required|max:255',
                'price'=>'required',
                'quantity'=>'required',
                'category'=>'required',
                'description'=>'required',
                'serves'=>'required',
                'contents'=>'required',
            ]);
            
            $food = new Food;
    
            $food->fill($request->except('actionType'));
            $food->save();
            $request->session()->flash('message','Food Created Successfully');
            return response()->json(['success'=>true,'result'=>'Food Created Successfully','food'=>$food]);
        }
        else{
            return $this->update($request,Food::findOrFail($request['id']));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        $request->validate([
            'food_name'=>'required|max:255',
            'price'=>'required',
            'quantity'=>'required',
            'category'=>'required',
            'description'=>'required',
            'serves'=>'required',
            'contents'=>'required',
        ]);
        
        $food->fill($request->except('actionType'));
        $food->save();
        $request->session()->flash('message','Food Updated Successfully');
        return response()->json(['success'=>true,'result'=>'Food Updated Successfully','food'=>$food]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $addfood, Request $request)
    {
        $addfood->delete();
        $request->session()->flash('message','Food Deleted Successfully');
        return redirect()->back();    
    }
}
