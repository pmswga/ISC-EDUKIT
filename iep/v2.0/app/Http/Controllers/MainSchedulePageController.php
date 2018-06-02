<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainSchedulePageController extends Controller
{
    public function index()
    {
      return view("main_schedule");
    }
}
