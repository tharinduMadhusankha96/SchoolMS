<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use App\suppliers;
use App\stationary;
use App\labs;
use App\sports;
use App\Resources;
use DB;

class homeview extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }
    public function index()
    {
        $items = stationary::all()->count();
        $pending = Orders::all()->count();
        $labs = labs::all()->count();
        $sports = sports::all()->count();
        $resources = Resources::all()->count();


        return view('home.inventory')->with('data', ['pending' => $pending, 'items' => $items, 'labs' => $labs,
                                                'sports' => $sports, 'resources' => $resources]);

    }


}
