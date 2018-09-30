<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CanCustomer;
use App\CanProduct;
use App\CanSale;
use App\BokCustomer;
use App\BokProduct;
use App\BokSale;
class InvoiceController extends Controller
{
    public function index(){

        $CanProduct=CanProduct::pluck('productname','id');
        return view('invoice.info',compact('CanProduct'));
    }

    public function insert(Request $request)
    {
        $CanCustomer = new CanCustomer;
        $CanCustomer->name = $request->name;
        $CanCustomer->phone = $request->phone;
        if ($CanCustomer->save()) {
            $id = $CanCustomer->id;
            foreach ($request->productname as $key => $v) {
                $data = array('cus_id' => $id,
                    'pro_id' => $v,
                    'qty' => $request->qty[$key],
                    'price' => $request->price[$key],
                    'dis' => $request->dis[$key],
                    'amount' => $request->amount[$key]);
                CanSale::insert($data);
            }
        }
        return back();
    }
    public function edit(){
        return view('invoice.update');
    }
    public function update(){

    }
    public function findPrice(Request $request)
    {
        $data =CanProduct::select('price')->where('id',$request->id)->first();
        return response()->json($data);
    }

    public function indexB(){

        $BokProduct=BokProduct::pluck('productname','id');
        return view('Binvoice.info',compact('BokProduct'));
    }

    public function insertB(Request $request){
        $BokCustomer = new BokCustomer;
        $BokCustomer -> name=$request->name;
        $BokCustomer->phone=$request->phone;
        if($BokCustomer->save()){
            $id = $BokCustomer->id;
            foreach($request->productname as $key =>$p){
                $data = array('cus_id'=>$id,
                    'pro_id'=>$p,
                    'qty'=>$request->qty[$key],
                    'price'=>$request->price[$key],
                    'dis'=>$request->dis[$key],
                    'amount'=>$request->amount[$key]);
                BokSale::insert($data);
            }
        }
        return back();
    }
    public function editB(){
        return view('Binvoice.update');
    }
    public function updateB(){

    }
    public function findPriceB(Request $request)
    {
        $data =BokProduct::select('price')->where('id',$request->id)->first();
        return response()->json($data);
    }

}
