<?php

namespace App\Http\Controllers\Elder;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ElderPageController extends Controller
{
    public function index()
    {
        return view('elder.index');
    }

}
