<?php

namespace App\Http\Controllers\Accounts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{

    public function index()
    {
        return view('accounts.student.index');
    }

    public function settings()
    {
        return view('accounts.student.settings');
    }

}
