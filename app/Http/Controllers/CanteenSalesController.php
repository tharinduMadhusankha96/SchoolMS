<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CanSale;
class CanteenSalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $CanSale = CanSale::all();
        return view('Sale.index',compact('CanSale'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CanteenSales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'id'=>'required',
            'type'=>'required',
            'qty'=>'required',
            'item_price'=>'required'

        ]);
        $CanteenSales =new CanteenSales;
        $CanteenSales->id=$request->input('id');
        $CanteenSales->type=$request->input('type');

        $CanteenSales->qty=$request->input('qty');
        $CanteenSales->item_price=$request->input('item_price');

        $CanteenSales->save();
        return redirect()->route('CanteenSales.create')->with('success','Data added');
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
        $CanteenSales = CanteenSales::find($id);
        return view('CanteenSales.edit', compact('CanteenSales',$CanteenSales));
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
        $this->validate($request,[

            'type'=>'required',
            'qty'=>'required',
            'item_price'=>'required'


        ]);
        $CanteenSales =CanteenSales::find($id);

        $CanteenSales->type=$request->input('type');
        $CanteenSales->qty=$request->input('qty');
        $CanteenSales->item_price=$request->input('item_price');



        $CanteenSales->save();
        return redirect()->route('CanteenSales.index')->with('success','Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $CanteenSales =CanteenSales::find($id);
        $CanteenSales->delete();
        return redirect()->route('CanteenSales.index')->with('success','Item deleted');

    }
}
