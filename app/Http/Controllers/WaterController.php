<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Water;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\Authenticatable;

class WaterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $waters = Water::all();
        return View("Water.delete",compact("waters"));
    }

    public function search(Request $request)
    {
        $result = $this->validate($request,[
            'monthYear'=>['required','exists:waters,MonthYear'],
        ],[
            //'MonthYear.regex'=>'error message',
            'monthYear.exists'=>'Record Not Found',
        ]);

        $waters = Water::where('monthYear','=',$request->input('monthYear'))->get();
        return view("Water.delete",compact("waters"));


    }




    public function create()
    {
        return view("Waterphone");
    }


    public function store(Request $request)
    {

        $this->validate($request,[

            'MonthYear'=>['required','unique:waters','regex:/[0-9a-zA-Z]+$/'],
            'Place'=>['required','regex:/[0-9a-zA-Z]+$/'],
            'PaymentMethod'=>'required',
            'Amount'=>['required','regex:/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/'],
        ],[

            'MonthYear.regex'=>'Invalid Format ',
            'Amount.regex'=>'Please Enter Positive Amount '

        ]);


        $bills = new Water();
        $bills ->MonthYear = Input::get('MonthYear');
        $bills ->Place = Input::get('Place');
        $bills ->PaymentMethod = Input::get('PaymentMethod');
        $bills ->Amount = Input::get('Amount');
        $bills ->PaidDate = Input::get('PaidDate');
        $bills->Save();



        return redirect('index')->with('success', "Water Bill Payment Details of '" . "{$bills->MonthYear}" . "' has been Recorded ");
    }


    public function Tshow($id)
    {

    }


    public function edit($Wid)
    {
        $waters =Water::where('Wid','=',$Wid);
        return view('Water.WaterUpdate',compact('waters','Wid'));

    }


    public function update(Request $request)
    {
        $this->validate($request,[

            //'MonthYear'=>['required','unique:waters','regex:/[0-9a-zA-Z]+$/'],

            'Place'=>['required','regex:/[0-9a-zA-Z]+$/'],
            'PaymentMethod'=>'required',
            'Amount'=>['required','regex:/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/'],
        ],[

            //'MonthYear.regex'=>'Invalid Format ',


            'Amount.regex'=>'Please Enter Valid Amount '

        ]);

        $bills = Water::where('MonthYear','=',$request->input('MonthYear'))->first();

        $bills ->MonthYear = $request->input('MonthYear');
        $bills ->Place = $request->input('Place');
        $bills ->PaymentMethod = $request->input('PaymentMethod');
        $bills ->Amount = $request->input('Amount');
        $bills ->PaidDate = $request->input('PaidDate');
        $bills->save();

        // dd($bills);
        return redirect('index')->with('success', "Water Bill Payment Details of '" . "{$bills->MonthYear}" . "' has been Updated ");








    }


    public function destroy($MonthYear)
    {
        $bills =Water::where('MonthYear','=',$MonthYear);
        $bills->delete();
        return redirect("index");
    }
}
