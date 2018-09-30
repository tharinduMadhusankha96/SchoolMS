<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function HomePage(){
        return View('Finance/home');
    }

    public function billPage(){

        return View('Finance/bill');
    }

    public function WaterPage(){

        return View('Water/water');
    }
    public function TelephonePage(){

        return View('Tele/Telephone');
    }
    public function ElectricPage(){

        return View('Electric/Electric');
    }
    public function OtherPage(){

        return View('Other/other');
    }
    public function FundsPage(){

        return View('Funds/funds');
    }
    public function budget(){

        return View('Budget/budget');
    }

    public function AnnualReport(){
        return view('AnnualReoprt/AnnualReport');
    }
    public function MonthlyReport(){
        return view('MonthlyReport/MonthlyReport');
    }
}
