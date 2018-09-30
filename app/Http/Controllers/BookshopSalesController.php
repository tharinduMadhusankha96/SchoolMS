<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BokSale;
class BookshopSalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $BokSale = BokSale::all()->toArray();
        return view('BSale.index',compact('BokSale'));
        //return view('BookshopSales.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BookshopSales.create');
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
        $BookshopSales =new BookshopSales;
        $BookshopSales->id=$request->input('id');
        $BookshopSales->type=$request->input('type');

        $BookshopSales->qty=$request->input('qty');
        $BookshopSales->item_price=$request->input('item_price');

        $BookshopSales->save();
        return redirect()->route('BookshopSales.create')->with('success','Data added');
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
        $BookshopSales = BookshopSales::find($id);
        return view('BookshopSales.edit',compact('BookshopSales',$BookshopSales));
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
        $BookshopSales =BookshopSales::find($id);

        $BookshopSales->type=$request->input('type');
        $BookshopSales->qty=$request->input('qty');
        $BookshopSales->item_price=$request->input('item_price');



        $BookshopSales->save();
        return redirect()->route('BookshopSales.index')->with('success','Data Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $BokSale = BokSale::find($id);
        $BokSale->delete();
        return redirect()->route('BSale.index')->with('success',' Item Deleted');
    }
}
