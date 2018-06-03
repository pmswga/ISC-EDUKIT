<?php

namespace App\Http\Controllers\Director;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DirectorPageController extends Controller
{
    public function index()
    {
      return view("director.index");
    }
}

