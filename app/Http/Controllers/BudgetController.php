<?php

namespace App\Http\Controllers;
use App\Budget;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function Bindex()
    {
        $Electrics = Budget::all();
        return View("Budget.BudgetDelete",compact("Electrics"));
    }
    public function Bsearch(Request $request)
    {

        $result = $this->validate($request,[
            'typeandYear'=>['required','exists:budgets,TypeandYear'],
        ],[
            //'MonthYear.regex'=>'error message',
            'typeandYear.exists'=>'Record Not Found',
        ]);

        $Electrics =Budget::where('TypeandYear','=',$request->input('typeandYear'))->get();
        return view("Budget.BudgetDelete",compact("Electrics"));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Bstore(Request $request)
    {

        $this->validate($request,[

            'TypeandYear'=>['required','unique:budgets','regex:/[0-9a-zA-Z]+$/'],
            'Year'=>['required','regex:/^[0-9]+$/'],
            'ExpectedAmount'=>['required','regex:/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/'],
        ],[

            'TypeandYear.regex'=>'Invalid Format ',
            'Year.regex'=>'Incorrect ',
            'ExpectedAmount.regex'=>'Please Enter Positive Amount '

        ]);


        $bills = new Budget();
        $bills ->TypeandYear = Input::get('TypeandYear');
        $bills ->ExpectedAmount = Input::get('ExpectedAmount');
        $bills->Year =Input::get('Year');
        $bills->Save();
        return redirect('Bindex')->with('success', "Record of '" . "{$bills->TypeandYear}" . "' has been Recorded ");

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
    public function Bedit($Bid)
    {
        $Electrics =Budget::where('TypeandYear','=',$Bid);
        //return view('ElectricUpdate',compact('Electrics'));
        return view('Budget.BudgetUpdate',compact('Electrics','Bid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Bupdate(Request $request)
    {
        $this->validate($request, [

            'TypeandYear' => ['required','regex:/[0-9a-zA-Z]+$/'],
            'Year' => ['required', 'regex:/^[0-9]+$/'],
            'ExpectedAmount' => ['required', 'regex:/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/'],
        ], [

            'TypeandYear.regex' => 'Invalid Format ',
            'Year.regex' => 'Incorrect ',
            'ExpectedAmount.regex' => 'Please Enter Positive Amount '

        ]);


        $bills = Budget::where('TypeandYear', '=', $request->get('TypeandYear'))->first();
        $bills->Year = $request->input('Year');
        $bills->ExpectedAmount = $request->input('ExpectedAmount');
        $bills->save();

        return redirect('Bindex')->with('success', "The Record Of  '" . "{$bills->TypeandYear}" . "' has been Updated ");

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Bdestroy($TypeandYear)
    {
        $bills =Budget::where('TypeandYear','=',$TypeandYear);
        $bills->delete();
        return redirect("Bindex");

    }
}
