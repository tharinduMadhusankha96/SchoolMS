<?php

namespace App\Http\Controllers;

use App\Electric;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\Authenticatable;

use Illuminate\Http\Request;

class ElectricController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function eindex()
    {
        $Electrics = Electric::all();
        return View("Electric.edelete",compact("Electrics"));
    }

    public function esearch(Request $request)
    {

        $result = $this->validate($request,[
            'monthYear'=>['required','exists:electrics,MonthYear'],
        ],[
            //'MonthYear.regex'=>'error message',
            'monthYear.exists'=>'Record Not Found',
        ]);


        $Electrics = Electric::where('MonthYear','=',$request->input('monthYear'))->get();
        return view("Electric.edelete",compact("Electrics"));


    }
    public function create()
    {
        return view("Electric");
    }


    public function estore(Request $request)
    {

        $this->validate($request,[

            'MonthYear'=>['required','unique:Electrics','regex:/[0-9a-zA-Z]+$/'],
            'Place'=>['required','regex:/[0-9a-zA-Z]+$/'],
            // 'Place'=>['required','regex:/^[a-zA-Z]+$/'],
            'PaymentMethod'=>'required',
            'Amount'=>['required','regex:/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/'],
        ],[

            'MonthYear.regex'=>'Invalid Format ',
            'Place.regex'=>'Incorrect ',
            'Amount.regex'=>'Please Enter Positive Amount '

        ]);


        $bills = new Electric();
        $bills ->MonthYear = Input::get('MonthYear');
        $bills ->Place = Input::get('Place');
        $bills ->PaymentMethod = Input::get('PaymentMethod');
        $bills ->Amount = Input::get('Amount');
        $bills ->PaidDate = Input::get('PaidDate');
        $bills->Save();
        return redirect('eindex')->with('success', "Electricity Bill Payment Details of '" . "{$bills->MonthYear}" . "' has been Recorded ");

        //return redirect("eindex");

    }


    public function Eshow($id)
    {

    }


    public function Eedit($Eid)
    {
        $Electrics =Electric::where('MonthYear','=',$Eid);
        //return view('ElectricUpdate',compact('Electrics'));
        return view('Electric.ElectricUpdate',compact('Electrics','Eid'));

    }


    public function eupdate(Request $request)
    {


        $this->validate($request,[

            // 'MonthYear'=>['required','unique:Teles','regex:/[0-9a-zA-Z]+$/'],
            'Place'=>['required','regex:/[0-9a-zA-Z]+$/'],
            // 'Place'=>['required','regex:/^[a-zA-Z]+$/'],
            'PaymentMethod'=>'required',
            'Amount'=>['required','regex:/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/'],
        ],[

            // 'MonthYear.regex'=>'Invalid Format ',

            'Place.regex'=>'Incorrect',
            'Amount.regex'=>'Please Enter Positive Amount '

        ]);





        $bills = Electric::where('MonthYear','=',$request->get('MonthYear'))->first();

        //$bills ->MonthYear = $request->input('MonthYear');

        $bills ->Place = $request->input('Place');
        $bills ->PaymentMethod = $request->input('PaymentMethod');
        $bills ->Amount = $request->input('Amount');
        $bills ->PaidDate = $request->input('PaidDate');
        $bills->save();

        //dd($bills);
        return redirect('eindex')->with('success', "Electricity Bill Payment Details of '" . "{$bills->MonthYear}" . "' has been Updated ");
    }


    public function edestroy($MonthYear)
    {
        $bills =Electric::where('MonthYear','=',$MonthYear);
        $bills->delete();
        return redirect("eindex");
    }
}
