<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use ConsoleTVs\Charts;
use ConsoleTVs\Charts\Charts;
//use Charts;
use App\Event;
use Illuminate\Support\Facades\DB;

class EventAdminController extends Controller
{
    public function eventAdmin()
    {
        return view('adminPages.eventAdmin');
    }

    public function societyAdmin()
    {
        return view('adminPages.societyAdmin');
    }

    public function sportAdmin()
    {
        return view('adminPages.sportsAdmin');
    }
}
