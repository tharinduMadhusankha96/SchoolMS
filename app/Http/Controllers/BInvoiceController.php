<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
//use App\Http\Controllers\Controller;

use App\BokCustomer;
use App\BokProduct;
use App\BokSale;
class BInvoiceController extends Controller
{
    public function index(){

        $BokProduct=BokProduct::pluck('productname','id');
        return view('Binvoice.info',compact('BokProduct'));
    }

    public function insert(Request $request){
        $BokCustomer = new BokCustomer;
        $BokCustomer -> name=$request->name;
        $BokCustomer->phone=$request->phone;
        if($BokCustomer->save()){
            $id = $BokCustomer->id;
            foreach($request->productname as $key =>$s){
                $data = array('cus_id'=>$id,
                    'pro_id'=>$s,
                    'qty'=>$request->qty[$key],
                    'price'=>$request->price[$key],
                    'dis'=>$request->dis[$key],
                    'amount'=>$request->amount[$key]);
                BokSale::insert($data);
            }
        }
        return back();
    }
    public function edit(){
        return view('Binvoice.update');
    }
    public function update(){

    }
    public function findPrice(Request $request)
    {
        $data =BokProduct::select('price')->where('id',$request->id)->first();
        return response()->json($data);
    }
}
