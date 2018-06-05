<?php

namespace App\Http\Controllers\CRUDControllers;

use App\News;
use Illuminate\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{

    public function index()
    {
        switch (\Auth::user()->id_type_user) {
            case 1: {
                echo "Заведующий отделением";
            } break;
            case 2: {
                $news = News::where('id_author', \Auth::user()->id);

                return view('teacher.news.index', [
                    'news_list' => $news->paginate(10)
                ]);
            } break;
            case 6: {
                return view('admin.news.index', [
                    'news_list' => News::paginate(10)
                ]);
            } break;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'title', 'content', 'id_author', 'publication_date'
        ]);

        $data['publication_date'] = date('Y-m-d');

        News::create($data);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return back();
    }
}
