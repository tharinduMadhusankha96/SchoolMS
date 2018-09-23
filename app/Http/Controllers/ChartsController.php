<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use ConsoleTVs\Charts;
//use ConsoleTVs\Charts\charts;
use Charts;
use App\Event;
use Illuminate\Support\Facades\DB;

class ChartsController extends Controller
{
    public function index()
    {
        $events = Event::where(DB::raw("(DATE_FORMAT(from_date , '%Y' ))"), date('Y'))->get();
        $chart = Charts::database($events , 'bar' , 'highcharts')
            ->title("Event Details")
            ->elementTable("All Events")
            ->dimensions(10 , 5)
            ->responsive(false)
            ->groupByMonth(date('Y'), true );

        return view('eventAdmin', compact('chart'));
    }
}
