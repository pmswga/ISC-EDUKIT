<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherPageController extends Controller
{
    public function index()
    {
        return view('teacher.index');
    }

    public function settings()
    {
        return view('teacher.settings');
    }

}
