<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function sports()
    {
        return view('sports.sports');
    }

    public function cricket()
    {
        return view('sports.cricket');
    }

}
