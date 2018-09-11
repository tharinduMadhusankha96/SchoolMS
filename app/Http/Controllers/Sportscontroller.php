<?php

namespace App\Http\Controllers;

use App\Orders;
use App\sports;
use App\suppliers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class Sportscontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stock = sports::all();
        $orders = Orders::where('type','=','Sports Items')->count();
        $stitems = DB::table('sports')->where('amount','=',sports::min('amount'))->pluck('name');

        return view('inventory.sports.sports')->with('stocks', $stock)->with('orders',$orders)->with('st',$stitems);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user()->id;
        if ($user == 1) {
            $supplier = suppliers::where('type', '=', 'SP')->get();
            return view('inventory.sports.addsports')->with('suppliers', $supplier);
        } else {
            return redirect()->back()->with('error', 'You do not have rights to perform this action');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sports = new sports;
        $sports->name = $request->input('name');
        $sports->productID = $request->input('productID');
        $sports->amount = $request->input('amount');
        $sports->supplierID = $request->input('supplier');

        $name= $request->input('name');
        $pid = $request->input('productID');
        if(DB::table('sports')->where('name','=',$name)->exists()){
            return redirect()->back()->with('error','Item already exists in the database');
        }
        elseif (DB::table('sports')->where('productID','=',$pid)->exists()){
            return redirect()->back()->with('error','Item already exists in the database');
        }
        elseif ($request->input('amount') > 0){
            if($request->input('productID') > 500 && $request->input('productID') < 600 ){
                $sports->save();
                return redirect('/sports')->with('success','Record was added to the database sucessfully');
            }
        }

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
        $user = Auth::user()->id;
        $sport = sports::find($id);
        $supplier = suppliers::where('type', '=', 'SP')->get();
        if($user == 1){
            return view('inventory.sports.sportsedit')->with('sport',$sport)->with('suppliers',$supplier);
        }
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
        $sports = sports::find($id);
        $sports->name = $request->input('name');
        $sports->productID = $request->input('productID');
        $sports->amount = $request->input('amount');
        $sports->supplierID = $request->input('supplier');

        $name= $request->input('name');
        $pid = $request->input('productID');
        if(DB::table('sports')->where('name','=',$name)->exists()){
            return redirect()->back()->with('error','Item already exists in the database');
        }
        elseif (DB::table('sports')->where('productID','=',$pid)->exists()){
            return redirect()->back()->with('error','Item already exists in the database');
        }
        elseif ($request->input('amount') > 0){
            if($request->input('productID') > 500 && $request->input('productID') < 600 ){
                $sports->save();
                return redirect('/sports')->with('success','Record was added to the database sucessfully');
            }
        }
        else{
            return redirect()->back()->with('error','Enter the correct quantity');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user()->id;
        $sport = sports::find($id);
        if($user == 1){
            $sport->delete();
            return back()->with('success','Record was deleted successfully');
        }
        else{
            return redirect()->back()->with('error','You do not have right to perform this action');
        }
    }
}
