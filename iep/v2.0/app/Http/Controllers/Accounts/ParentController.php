<?php

namespace App\Http\Controllers\Accounts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParentController extends Controller
{
    
    public function index()
    {
        return view('accounts.parent.index');
    }

}
