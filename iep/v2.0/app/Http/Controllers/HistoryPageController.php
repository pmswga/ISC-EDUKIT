<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryPageController extends Controller
{
    public function index()
    {
        return view('history');
    }
}
