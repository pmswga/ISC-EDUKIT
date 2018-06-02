<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherPageController extends Controller
{
    public function index()
    {
        return view('teacher');
    }
}
