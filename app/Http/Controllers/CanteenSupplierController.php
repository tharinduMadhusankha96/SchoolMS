<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CanteenSupplier;
class CanteenSupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $CanteeenSupplier = CanteenSupplier::all()->toArray();
        return view('CanteenSupplier.index',compact('CanteeenSupplier','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CanteenSupplier.create');
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
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'type'=>'required',
            'qty'=>'required'
        ]);
        $CanteeenSupplier =new CanteenSupplier;
        $CanteeenSupplier->name=$request->input('name');
        $CanteeenSupplier->phone=$request->input('phone');
        $CanteeenSupplier->email=$request->input('email');
        $CanteeenSupplier->type=$request->input('type');
        $CanteeenSupplier->qty=$request->input('qty');

        $CanteeenSupplier->save();
        return redirect()->route('CanteenSupplier.create')->with('success','Data added');
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
        $CanteenSupplier = CanteenSupplier::find($id);
        return view('CanteenSupplier.edit', compact('CanteenSupplier',$CanteenSupplier));
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
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'type'=>'required',
            'qty'=>'required'
        ]);
        $CanteeenSupplier =CanteenSupplier::find($id);
        $CanteeenSupplier->name=$request->input('name');
        $CanteeenSupplier->phone=$request->input('phone');
        $CanteeenSupplier->email=$request->input('email');
        $CanteeenSupplier->type=$request->input('type');
        $CanteeenSupplier->qty=$request->input('qty');

        $CanteeenSupplier->save();
        return redirect()->route('CanteenSupplier.index')->with('success','Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $CanteenSupplier =CanteenSupplier::find($id);
        $CanteenSupplier->delete();
        return redirect()->route('CanteenSupplier.index')->with('success','Item deleted');
    }
}
