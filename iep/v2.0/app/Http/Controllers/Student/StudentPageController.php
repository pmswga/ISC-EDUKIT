<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentPageController extends Controller
{
    public function index()
    {
        return view('student.index');
    }

    public function settings()
    {
        return view('student.settings');
    }

}
