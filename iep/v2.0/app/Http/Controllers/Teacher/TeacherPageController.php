<?php

namespace App\Http\Controllers\Teacher;

use App\News;
use Illuminate\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherPageController extends Controller
{
    public function index()
    {
        return view('teacher.index', [
            'count_news' => News::where('id_author', \Auth::user()->id)->count()
        ]);
    }

    public function settings()
    {
        return view('teacher.settings');
    }

}
