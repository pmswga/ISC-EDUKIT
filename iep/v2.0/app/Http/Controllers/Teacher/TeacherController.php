<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    public function index()
    {
        return view('teacher.index');
    }

    public function info()
    {
        return view('teacher.info');
    }

}
