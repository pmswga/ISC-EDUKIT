<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChangeSchedulePageController extends Controller
{
    public function index()
    {
      return view("change_schedule");
    }
}
