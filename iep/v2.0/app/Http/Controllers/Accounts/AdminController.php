<?php

namespace App\Http\Controllers\Accounts;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    
    public function index()
    {
        return view('accounts.admin.index', [
            'feedback_list_1' => Feedback::where("type", 1)->get(),
            'feedback_list_2' => Feedback::where("type", 2)->get(),
            'feedback_list_3' => Feedback::where("type", 3)->get()
        ]);
    }

    public function settings()
    {
        return view('accounts.admin.settings');
    }

}
