<?php

namespace App\Http\Controllers\Accounts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    
    public function index()
    {
        return view('accounts.admin.index');
    }

    public function settings()
    {
        return view('accounts.admin.settings');
    }

}
