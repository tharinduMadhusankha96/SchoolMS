<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Funds;use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\Authenticatable;

class FundsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function findex()
    {
        $waters = Funds::all();
        return View("Funds.fdelete",compact("waters"));
    }

    public function fsearch(Request $request)
    {

        $result = $this->validate($request,[
            'fundNameMonthYear'=>['required','exists:funds','regex:/[0-9a-zA-Z]+$/'],
        ],[
            'fundNameMonthYear.exists'=>'Record Not Found',
        ]);


        $waters = Funds::where('fundNameMonthYear','=',$request->input('fundNameMonthYear'))->get();
        return view("Funds.fdelete",compact("waters"));


    }
    public function create()
    {
        return view("funds");
    }



    public function fstore(Request $request)
    {

        $this->validate($request,[
            'FundNameMonthYear'=>['required','unique:funds','regex:/[0-9a-zA-Z]+$/'],
            'Donor'=>['required','regex:/^[a-zA-Z]+$/'],
            'ReceivedDate'=>'required',
            'ReceivedType'=>'required',
            'Amount'=>['required','regex:/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/'],
        ],[

            'FundName.regex'=>'Incorrect',
            'Donor.regex'=>'Incorrect',
            'Amount.regex'=>'Please Enter Valid Amount ',



        ]);


        $bills = new Funds();
        $bills ->FundNameMonthYear = Input::get('FundNameMonthYear');
        $bills ->Donor = Input::get('Donor');
        $bills ->ReceivedDate = Input::get('ReceivedDate');
        $bills ->ReceivedType = Input::get('ReceivedType');

        $bills ->Amount = Input::get('Amount');

        $bills->Save();



        return redirect("findex");
    }



    public function Tshow($id)
    {

    }


    public function fedit($FundNo)
    {
        $Fundss =Funds::where('FundNameMonthYear','=',$FundNo);
        //return view('FundsUpdate',compact('Fundss'));
        return view('Funds/fundsUpdate',compact('Fundss','FundNo'));

    }


    public function fupdate(Request $request)
    {


        $this->validate($request,[
            'FundNameMonthYear'=>['required','regex:/[0-9a-zA-Z]+$/'],
            'Donor'=>['required','regex:/^[a-zA-Z]+$/'],
            'ReceivedDate'=>'required',
            'ReceivedType'=>'required',
            'Amount'=>['required','regex:/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/'],
        ],[

            'FundNameMonthYear.regex'=>'Incorrect',
            'Donor.regex'=>'Incorrect',
            'Amount.regex'=>'Please Enter Valid Amount'


        ]);
        $bills = Funds::where('FundNameMonthYear','=',$request->input('FundNameMonthYear'))->first();

        // $bills->FundNameMonthYear =$request->input('FundNameMonthYear');

        $bills ->Donor = $request->input('Donor');
        $bills ->ReceivedDate = $request->input('ReceivedDate');
        $bills ->ReceivedType = $request->input('ReceivedType');
        $bills ->Amount = $request->input('Amount');

        $bills->save();

        //dd($bills);
        return redirect("findex");
    }


    public function fdestroy($FundNameMonthYear)
    {
        $bills =Funds::where('FundNameMonthYear','=',$FundNameMonthYear);
        $bills->delete();
        return redirect("findex");
    }
}
