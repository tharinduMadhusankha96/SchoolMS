<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CanteenItem;
class CanteenProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $CanteenItem = CanteenItem::all();
        return view('CanteenItem.index',compact('CanteenItem'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CanteenItem.create');
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
            'productname'=>'required',
            'qty'=>'required',

            'price'=>'required',
            'dis'=>'required',
            'amount'=>'required'

        ]);
        $CanteenItem =new CanteenItem;
        $CanteenItem->productname=$request->input('productname');
        $CanteenItem->qty=$request->input('qty');

        $CanteenItem->price=$request->input('price');
        $CanteenItem->dis=$request->input('dis');
        $CanteenItem->amount=$request->input('amount');

        $CanteenItem->save();
        return redirect()->route('CanteenItem.create')->with('success','Data added');
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
        $CanteenItem = CanteenItem::find($id);
        return view('CanteenItem.edit',compact('CanteenItem',$CanteenItem));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { $this->validate($request,[
        'productname'=>'required',
        'qty'=>'required',

        'price'=>'required',
        'dis'=>'required',
        'amount'=>'required'

    ]);
        $CanteenItem =CanteenItem::find($id);

        $CanteenItem->productname=$request->input('productname');
        $CanteenItem->qty=$request->input('qty');

        $CanteenItem->price=$request->input('price');
        $CanteenItem->dis=$request->input('dis');
        $CanteenItem->amount=$request->input('amount');

        $CanteenItem->save();
        return redirect()->route('CanteenItem.index')->with('success','Data updated');
    }
    public function destroy($id)
    {
        $CanteenItem = CanteenItem::find($id);
        $CanteenItem->delete();
        return redirect()->route('CanteenItem.index')->with('success','Item  deleted');
    }
}
