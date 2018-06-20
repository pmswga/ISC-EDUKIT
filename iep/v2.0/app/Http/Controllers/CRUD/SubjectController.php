<?php

namespace App\Http\Controllers\CRUD;

use App\Models\Lists\ListSubject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('accounts.admin.subjects.index', [
            'subject_list' => ListSubject::paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accounts.admin.subjects.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'description' => 'bail|required|max:255'
        ])->validate();

        $data = $request->only(['description']);

        ListSubject::create([
            'description' => $data['description']
        ]);

        return back()->with('success_msg', 'Предмет успешно добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lists\ListSubject  $listSubject
     * @return \Illuminate\Http\Response
     */
    public function show(ListSubject $listSubject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lists\ListSubject  $listSubject
     * @return \Illuminate\Http\Response
     */
    public function edit(ListSubject $listSubject)
    {
        print_r($listSubject);
        return view('accounts.admin.subjects.edit', ['subject' => $listSubject]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lists\ListSubject  $listSubject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListSubject $listSubject)
    {
        $listSubject->update($request);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lists\ListSubject  $listSubject
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListSubject $listSubject)
    {
        //
    }
}
