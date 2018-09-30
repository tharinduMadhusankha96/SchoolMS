<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookshopItem;
class BookshopProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $BookshopItem = BookshopItem::all();
        return view('BookshopItem.index',compact('BookshopItem'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BookshopItem.create');
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
        $BookshopItem =new BookshopItem;
        $BookshopItem->productname=$request->input('productname');
        $BookshopItem->qty=$request->input('qty');

        $BookshopItem->price=$request->input('price');
        $BookshopItem->dis=$request->input('dis');
        $BookshopItem->amount=$request->input('amount');

        $BookshopItem->save();
        return redirect()->route('BookshopItem.create')->with('success','Data added');
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
        $BookshopItem = BookshopItem::find($id);
        return view('BookshopItem.edit',compact('BookshopItem',$BookshopItem));
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
        $BookshopItem =BookshopItem::find($id);

        $BookshopItem->productname=$request->input('productname');
        $BookshopItem->qty=$request->input('qty');

        $BookshopItem->price=$request->input('price');
        $BookshopItem->dis=$request->input('dis');
        $BookshopItem->amount=$request->input('amount');

        $BookshopItem->save();
        return redirect()->route('BookshopItem.index')->with('success','Data added');
    }
    public function destroy($id)
    {
        $BookshopItem = BookshopItem::find($id);
        $BookshopItem->delete();
        return redirect()->route('BookshopItem.index')->with('success','Item  deleted');
    }
}
