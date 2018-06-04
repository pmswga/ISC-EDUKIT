<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsPageController extends Controller
{
    public function index()
    {
        return view('news', [
			'news_list' => News::paginate(3)
		]);
    }
}
