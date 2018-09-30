<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tele;
use App\Water;
use App\Electric;
use App\Other;
use App\Funds;
use Illuminate\Support\Facades\DB;

class MonthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Mindex(Request $request)
    {

        $T = Tele::whereYear('PaidDate','=',$request->input('Year'))->whereMonth('PaidDate', '=', $request->input('Month'))->sum('Amount');
        $W = Water::whereYear('PaidDate','=',$request->input('Year'))->whereMonth('PaidDate', '=', $request->input('Month'))->sum('Amount');
        $E = Electric::whereYear('PaidDate','=',$request->input('Year'))->whereMonth('PaidDate', '=', $request->input('Month'))->sum('Amount');
        $other =Other::whereYear('PaidDate','=',$request->input('Year'))->whereMonth('PaidDate', '=', $request->input('Month'))->sum('Amount');

        $Tot1 = $W +$T+$E+$other;

        $funds =Funds::whereYear('ReceivedDate','=',$request->input('Year'))->whereMonth('ReceivedDate', '=', $request->input('Month'))->sum('Amount');





        return view('MonthlyReport.MonthTotalSum',compact('T','W','E','Nonacademic','Tot','Library','funds','student','other','Event1','Tot1','Tot2'));


    }

    public function MonthlyRange(Request $request){
       /* $W = Water::whereYear('PaidDate','=',$request->input('Year'))->whereMonth('PaidDate', '=', $request->input('Month'))->whereYear('PaidDate','=',$request->input('Year'))->whereMonth('PaidDate', '=', $request->input('Month'))->sum('Amount');
        $E =Electric::whereYear('PaidDate','=',$request->input('Year'))->whereMonth('PaidDate', '=', $request->input('Month'))->whereYear('PaidDate','=',$request->input('Year'))->whereMonth('PaidDate', '=', $request->input('Month'))->sum('Amount');
        $T =Tele::whereYear('PaidDate','=',$request->input('Year'))->whereMonth('PaidDate', '=', $request->input('Month'))->whereYear('PaidDate','=',$request->input('Year'))->whereMonth('PaidDate', '=', $request->input('Month'))->sum('Amount');
        $other =Other::whereYear('PaidDate','=',$request->input('Year'))->whereMonth('PaidDate', '=', $request->input('Month'))->whereYear('PaidDate','=',$request->input('Year'))->whereMonth('PaidDate', '=', $request->input('Month'))->sum('Amount');
        $Tot1 = $W +$T+$E+$other;
        return view('MonthlyReport.MonthTotalSum',compact('T','W','E','Nonacademic','Tot','Library','funds','student','other','Event1','Tot1','Tot2'));

       */
          /* $W = Water::whereYear('PaidDate','=',$request+whereMonth('PaidDate','=',$request->input('YearMonth'))->sum('Amount'));
           $E =Electric::whereYear('PaidDate','=',$request+whereMonth('PaidDate','=',$request->input('YearMonth'))->sum('Amount'));
               $T =Tele::whereYear('PaidDate','=',$request+whereMonth('PaidDate','=',$request->input('YearMonth'))->sum('Amount'));
               $other =Other::whereYear('PaidDate','=',$request+whereMonth('PaidDate','=',$request->input('YearMonth'))->sum('Amount'));*/




     /*  $W = Water::whereYear(('PaidDate')->whereMonth('PaidDate','=',$request->input('Year','Month')))->sum('Amount');
       $T = Tele::whereYear('PaidDate')->whereMonth('PaidDate','=',$request->input('Year','Month'))->sum('Amount');
       $E = Electric::whereYear('PaidDate')->whereMonth('PaidDate','=',$request->input('Year','Month'))->sum('Amount');
       $other = Other::whereYear('PaidDate')->whereMonth('PaidDate','=',$request->input('Year','Month'))->sum('Amount');*/

       // $Tot1 = $W +$T+$E+$other;


        return view('MonthlyReport.MonthTotalSum',compact('T','W','E','Nonacademic','Tot','Library','funds','student','other','Event1','Tot1','Tot2'));

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
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
