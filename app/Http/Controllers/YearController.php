<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Water;
use App\Electric;
use App\Tele;
use App\Funds;
use App\Other;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Yindex(Request $request)
    {

        $W = Water::whereYear('PaidDate','=',$request->input('Year'))->sum('Amount');
        $T = Tele::whereYear('PaidDate', '=', $request->input('Year'))->sum('Amount');
        $E = Electric::whereYear('PaidDate', '=', $request->input('Year'))->sum('Amount');
        // $Event = checkEvent::where('Year', '=', $request->input('Year'))->sum('TExpence');
        $Other = Other::whereYear('PaidDate', '=', $request->input('Year'))->sum('Amount');

        $Tot1 = $W + $E + $T + $Other ;

        $funds = Funds::whereYear('ReceivedDate', '=', $request->input('Year'))->sum('Amount');


        $Tot2 =$funds;


        $Budget = $Tot1 - $Tot2;

        return view('AnnualReoprt/YearTotalSum', compact('T', 'W', 'E', 'Event', 'Nonacademic', 'Library', 'student', 'funds', 'Other','Event1', 'other', 'Tot1', 'Tot2', 'Budget'));



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
