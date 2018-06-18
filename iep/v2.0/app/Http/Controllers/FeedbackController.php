<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.feedback');
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
        Validator::make($request->all(),[
            'second_name' => 'bail|required|max:30',
            'first_name' => 'bail|required|max:30',
            'patronymic' => 'bail|required|max:30',
            'email' => 'bail|required|max:255',
            'type' => 'bail|required',
            'subject' => 'bail|required|max:255',
            'content' => 'bail|required',
        ])->validate();
        
        $data = $request->only([
            'second_name',
            'first_name',
            'patronymic',
            'email',
            'type',
            'subject',
            'content'
        ]);
        
        $result = Feedback::create([
            'second_name' => $data['second_name'],
            'first_name'  => $data['first_name'],
            'patronymic'  => $data['patronymic'],
            'email'       => $data['email'],
            'type'        => $data['type'],
            'subject'     => $data['subject'],
            'content'     => $data['content'],
        ]);

        return back()->with('success_msg', 'Ваше письмо было успешно отправлено.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        //
    }
}
