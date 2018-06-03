<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DirectorPageController extends Controller
{
    public function index()
    {
      return view("director.index");
    }
}

